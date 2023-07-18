<?php

namespace App\Tests\Integration;

class ExtractedCodeApiCalls
{
    public function makeCalls($socialsArray, $text, $access_token_link, $userID, $access_token_tw): bool
    {
        $test = true;
        $mh = curl_multi_init();
        $handles = array();
        //1 Post to Twitter
        if (in_array('twitter', $socialsArray)) {
            $url = 'https://api.twitter.com/2/tweets';
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
        return ($test);

    }
}