<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry as ManagerRegistryAlias;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Abraham\TwitterOAuth\TwitterOAuth;
use GuzzleHttp\Client;


class PostContentController extends AbstractController
{
    #[Route('/post', name: 'app_post_content')]
    public function index(Request $request, ManagerRegistryAlias $doctrine, UserRepository $repository)
    {
        $session = $request->getSession();
        $choices = array();
        if (!$session->has('user_email')) {
            return ($this->redirectToRoute('app_login', [
                'error_message' => "⨂ Please sign in to post on your social media"
            ]));
        }
        if ($session->has('facebook_session')) {
            $choices[$session->get('facebook_session')['picture']] = 'facebook';
        }
        if ($session->has('twitter_session')) {
            $choices[$session->get('twitter_session')['picture']] = 'twitter';
        }
        if ($session->has('linkedin_session')) {
            $choices[$session->get('linkedin_session')['picture']] = 'linkedin';
        }

        if (!$choices) {
            return ($this->redirectToRoute('app_social_media', [
                'error_message' => "⨂ Please start by setting up a social media account"
            ]));
        }
        $post = new Post();
        $form = $this->createForm(PostType::class, $post, [

            'postedOn' => $choices,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            //set up post
            $currentTimeStamp = new \DateTime();
            $post->setPostTime($currentTimeStamp);
            $user = $repository->findOneBy(['email' => $session->get('user_email')]);
            $post->setUser($user);
            $manager = $doctrine->getManager();
            $socialsArray = ($form->getData()->getPostedOn());
            $text = $form->getData()->getTextContent();
            //make api calls to every social media in $socialsArray to post $text
            //creating a multi call handler
            $mh = curl_multi_init();
            $handles=array();
            //1 Post to Twitter
            if (in_array('twitter', $socialsArray)) {
                $url = 'https://api.twitter.com/2/tweets';
                $access_token_tw = $session->get('twitter_session')['token'];
                $chTwitter = curl_init($url);
                curl_setopt($chTwitter, CURLOPT_POST, true);
                curl_setopt($chTwitter, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . $access_token_tw,
                    'Content-Type: application/json',
                ]);
                curl_setopt($chTwitter, CURLOPT_POSTFIELDS, json_encode(['text' => $text]));
                curl_setopt($chTwitter, CURLOPT_RETURNTRANSFER, true);
                curl_multi_add_handle($mh, $chTwitter);
                $handles['twitterHandler']=$chTwitter;
            }


            //2 Post to Linkedin
            if(in_array('linkedin', $socialsArray)){
                $access_token_link = $session->get('linkedin_session')['token'];
                $userID=($session->get('linkedin_session')['user'])->getId();
                $data = [
                    'author' => "urn:li:person:$userID",
                    'lifecycleState' => 'PUBLISHED',
                    'specificContent' => [
                        'com.linkedin.ugc.ShareContent' => [
                            'shareCommentary' => [
                                'text' => $text
                            ],
                            'shareMediaCategory' => 'NONE'
                        ]
                    ],
                    'visibility' => [
                        'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
                    ]
                ];

                $data_json = json_encode($data);

                $chLinkedin = curl_init();
                curl_setopt($chLinkedin, CURLOPT_URL, "https://api.linkedin.com/v2/ugcPosts");
                curl_setopt($chLinkedin, CURLOPT_POST, 1);
                curl_setopt($chLinkedin, CURLOPT_POSTFIELDS, $data_json);
                curl_setopt($chLinkedin, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($chLinkedin, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$access_token_link,
                    'X-Restli-Protocol-Version: 2.0.0'
                ));
                curl_multi_add_handle($mh, $chLinkedin);
                $handles['linkedinHandler']=$chLinkedin;
            }


            // Execute the requests in parallel
            do {
                $mrc = curl_multi_exec($mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);

            while ($active && $mrc == CURLM_OK) {
                if (curl_multi_select($mh) != -1) {
                    do {
                        $mrc = curl_multi_exec($mh, $active);
                    } while ($mrc == CURLM_CALL_MULTI_PERFORM);
                }
            }
            // Close the handles
            foreach ($handles as $key => $value)
            {
                curl_multi_remove_handle($mh, $value);
            }
            curl_multi_close($mh);

            //3 Post to Facebook
            //Facebook should be  called last since we're using a redirection link rather than an api call
            if (in_array('facebook', $socialsArray)) {
                $appId = $_ENV['FCB_ID'];
                $link_start = strpos($text, 'http');
                $link = '';
                $appId = $_ENV['FCB_ID'];
                if (!$link_start) {
                    $this->addFlash('missing_link', '⨂ A link to your article is required');
                    return ($this->redirectToRoute("app_post_content"));

                }
                for ($i = $link_start; $i < strlen($text); $i++) {
                    if ($text[$i] == ' ') {
                        break;
                    }
                    $link .= $text[$i];
                }
                $manager->persist($post);
                $manager->flush();
                return ($this->redirect("https://www.facebook.com/dialog/feed?app_id=$appId&display=page&link=$link&redirect_uri=http://localhost:8000/socialmedia"));
            }
            $manager->persist($post);
            $manager->flush();
            return ($this->redirectToRoute("app_social_media"));
        } else {

            $options=[];
            $i=0;
            foreach ($choices as $key=>$value){
                $options[$i]=$value;
                $i++;
            }
            return $this->render('post_content/index.html.twig', [
                'form' => $form->createView(),
                'options'=>$options,

            ]);
        }


    }
}
