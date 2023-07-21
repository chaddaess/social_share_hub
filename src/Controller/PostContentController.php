<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\UserRepository;
use CURLFile;
use Doctrine\Persistence\ManagerRegistry as ManagerRegistryAlias;
use DOMDocument;
use mysql_xdevapi\Exception;
use PHPUnit\Framework\Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use ValueError;
use OpenApi\Annotations as OA;



class PostContentController extends AbstractController
{
    #[Route('/post', name: 'app_post_content')]
    public function index(Request $request, ManagerRegistryAlias $doctrine, UserRepository $repository, SluggerInterface $slugger)
    {
        $test = true;
        $session = $request->getSession();
        $choices = array();
        if (!$session->has('user_email')) {
            return ($this->redirectToRoute('app_login', [
                'error_message' => "⨂ Please sign in to post on your social media"
            ]));
        }
        if ($session->get('facebook_session')['picture'] != '') {
            $choices[$session->get('facebook_session')['picture']] = 'facebook';
        }
        if ($session->get('twitter_session')['picture'] != '') {
            $choices[$session->get('twitter_session')['picture']] = 'twitter';
        }
        if ($session->get('linkedin_session')['picture'] != '') {
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
        if ($form->isSubmitted() && $form->isValid()) {
            //get form input data
            $socialsArray = ($form->getData()->getPostedOn());
            $text = $form->getData()->getTextContent();
            //set up post
            $currentTimeStamp = new \DateTime();
            $post->setPostTime($currentTimeStamp);
            $user = $repository->findOneBy(['email' => $session->get('user_email')]);
            $post->setUser($user);
            $link = $this->extractLink($text);
            $post->setLink($link);
            $post->setImage($this->extractPicture($link));
            $post->setText($this->extractText($text));
            $post_info = $this->extractInfoLink($link);
            $post->setDomain($post_info['domain']);
            $post->setTitle($post_info['title']);
            $manager = $doctrine->getManager();

            if ($link == '') {
                $this->addFlash('missing_link', '⨂ A link to your article is required');
                return ($this->redirectToRoute("app_post_content"));
            }
            if (count($socialsArray) == 0) {
                $this->addFlash('curl_error', "⨂ please choose an account");
                return ($this->redirectToRoute("app_post_content"));
            }
            //make api calls to every social media in $socialsArray to post $text
            //creating a multi call handler
            $mh = curl_multi_init();
            $handles = array();
            //1 Post to Twitter
            if (in_array('twitter', $socialsArray)) {
                $url = 'https://api.twitter.com/2/tweets';
                $access_token_tw = ($repository->findOneBy(['email' => $session->get('user_email')])->getTwitterToken());
                $chTwitter = curl_init($url);
                curl_setopt($chTwitter, CURLOPT_POST, true);
                curl_setopt($chTwitter, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . $access_token_tw,
                    'Content-Type: application/json',
                ]);
                curl_setopt($chTwitter, CURLOPT_POSTFIELDS, json_encode(['text' => $text]));
                curl_setopt($chTwitter, CURLOPT_RETURNTRANSFER, true);
                curl_multi_add_handle($mh, $chTwitter);
                $handles['twitterHandler'] = $chTwitter;
            }


            //2 Post to Linkedin
            if (in_array('linkedin', $socialsArray)) {
                $access_token_link = ($repository->findOneBy(['email' => $session->get('user_email')])->getLinkedinToken());
                $userID = $repository->findOneBy(['email' => $session->get('user_email')])->getLinkedinId();
                //post without any picture
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
                    ],
                ];
                $data_json = json_encode($data);
                $chLinkedin = curl_init();
                curl_setopt($chLinkedin, CURLOPT_URL, "https://api.linkedin.com/v2/ugcPosts");
                curl_setopt($chLinkedin, CURLOPT_POST, 1);
                curl_setopt($chLinkedin, CURLOPT_POSTFIELDS, $data_json);
                curl_setopt($chLinkedin, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($chLinkedin, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $access_token_link,
                    'X-Restli-Protocol-Version: 2.0.0'
                ));
                curl_multi_add_handle($mh, $chLinkedin);
                $handles['linkedinHandler'] = $chLinkedin;
            }

            //Execute the requests in parallel
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

            foreach ($handles as $key => $handle) {
                $response = curl_multi_getcontent($handle);
                $responseData = json_decode($response, true);
                if (!$responseData) {
                    $error = "unknown";
                    $test = false;
                    break;
                } else {
                    if (array_key_exists('status', $responseData)) {
                        if (isset($responseData['status']) && $responseData['status'] < 200 || $responseData['status'] >= 300) {
                            if (array_key_exists('detail', $responseData)) {
                                $error = $responseData['detail'];
                            } else {
                                $error = $responseData['message'];
                            }
                            $test = false;
                            break;
                        }
                    }
                }

            }
            if (!$test) {
                $this->addFlash('curl_error', "⨂ Error:$error please try again");
                return ($this->redirectToRoute("app_post_content"));
            }
            // Close the handles
            foreach ($handles as $key => $value) {
                curl_multi_remove_handle($mh, $value);
            }
            curl_multi_close($mh);
            //3 Post to Facebook
            //Facebook should be  called last since we're using a redirection link rather than an api call
            if (in_array('facebook', $socialsArray)) {
                $appId = $_ENV['FCB_ID'];
                $manager->persist($post);
                $manager->flush();
                return ($this->redirect("https://www.facebook.com/dialog/feed?app_id=$appId&display=page&link=$link&redirect_uri=http://localhost:8000/socialmedia?success-posting=✓article%20posted%20successfully"));
            }

            $manager->persist($post);
            $manager->flush();
            return ($this->redirectToRoute("app_social_media", [
                'success-posting' => '✅article posted successfully'
            ]));
        } else {
            $options = [];
            $i = 0;
            foreach ($choices as $key => $value) {
                if ($key) {
                    $options[$i] = $value;
                    $i++;

                }
            }
            return $this->render('post_content/index.html.twig', [
                'form' => $form->createView(),
                'options' => $options,

            ]);
        }


    }

    /**
     *  extracts a URL from a given text
     *
     * an empty string is returned if no  http/https URL is found
     * @param string $text
     * @return string the link exctracted from the input string
     */
    public function extractLink(string $text): string
    {
        $text = ' ' . $text;
        $link_start = strpos($text, 'http');
        $link = '';
        if (!$link_start) {
            return ('');

        }
        for ($i = $link_start; $i < strlen($text); $i++) {
            if ($text[$i] == ' ') {
                break;
            }
            $link .= $text[$i];
        }
        return ($link);
    }

    /**
     * Extracts the URL of the main picture from a given website.
     *
     * If no image is found or if an error occurs while retrieving or parsing the HTML content, a default picture is returned.
     *
     * @param string $url The URL of the website to scan for a picture.
     *
     * @return string The URL of the main picture in the website, or a default picture if no image is found or if an error occurs.
     *
     * @throws Exception If there is an error while retrieving or parsing the HTML content of the URL.
     */
    public function extractPicture($url)
    {
        try {
            $html = file_get_contents($url);
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $imageTags = $doc->getElementsByTagName('img');
            $largestImage = '';
            $largestSize = 0;
            foreach ($imageTags as $tag) {
                $src = $tag->getAttribute('src');
                if ($src) {
                    $width = intval($tag->getAttribute('width'));
                    $height = intval($tag->getAttribute('height'));
                    $size = $width * $height;
                    if ($size > $largestSize) {
                        $largestSize = $size;
                        $largestImage = $src;
                    }
                }
                $srcset = $tag->getAttribute('data-srcset');
                if (!empty($srcset)) {
                    $sources = explode(',', $srcset);
                    foreach ($sources as $source) {
                        list($url, $size) = explode(' ', trim($source));
                        $size = intval($size);
                        if ($size > $largestSize) {
                            $largestSize = $size;
                            $largestImage = $url;
                        }
                    }
                }


            }
        } catch (\Exception|ValueError $e) {
            return ("img/article.png");
        }
        if ($largestImage == "") {
            $largestImage = "img/article.png";
        }
        return $largestImage;
    }

    /**
     * extracts text content that is not part of a URL from a string .
     * @param string $text string to be extract text from.
     * @return string  text content of the input string that is NOT part of a URL.
     */
    public function extractText(string $text): string
    {
        $link = $this->extractLink($text);
        $textContent = str_replace($link, "", $text);
        return (trim($textContent));
    }

    /**
     * Extracts the domain and title of an article from its URL.
     *
     * If no title is found or if an error occurs while retrieving or parsing the HTML content, '404 not found' is returned as title
     * @param string $link The URL of the article to extract information from.
     *
     * @return array An associative array containing the extracted domain and title.
     * The keys of the array are "domain" and "title".
     *
     * @throws Exception If there is an error while retrieving or parsing the HTML content of the URL.
     */
    public function extractInfoLink($link): array
    {
        try {
            $html = file_get_contents($link);
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $title = $doc->getElementsByTagName('title')->item(0)->nodeValue;
            $parsedUrl = parse_url($link);
            $domain = $parsedUrl['host'];
        } catch (\Exception|ValueError $e) {
            $domain = "unknown";
            $title = "404 not found";
            return ([
                "domain" => trim($domain),
                "title" => trim($title),
            ]);
        }

        return ([
            "domain" => trim($domain),
            "title" => trim($title),
        ]);
    }
}
