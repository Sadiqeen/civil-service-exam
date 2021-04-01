<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Facebook\Facebook;
use App\FacebookPostLog;


class FacebookController extends Controller
{
    protected $facebook;
    protected $page;
    protected $token;

    public function __construct()
    {
        $app_data = $this->getAppData();

        $this->page = $app_data['page_id'];
        $this->token = $app_data['page_token'];
        $this->facebook = new Facebook([
            'app_id' => $app_data['app_id'],
            'app_secret' => $app_data['app_secret'],
            'default_graph_version' => 'v9.0',
        ]);
    }

    public function commentToPost($post_id, $message)
    {
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $this->facebook->post("/{$post_id}/comments", [
                'message' => $message,
            ], $this->token);

        } catch (FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function postToPage($message = "Hello World", $question_id = 0)
    {

        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $this->facebook->post("/{$this->page}/feed", [
                'message' => $message,
            ], $this->token);

            FacebookPostLog::create([
                "post_id" => json_decode($response->getBody())->id,
                "question_id" => $question_id,
            ]);
        } catch (FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    private function getAppData()
    {
        $app_id = Setting::where('name', 'facebook_app_id')->first();
        $app_secret = Setting::where('name', 'facebook_app_secret')->first();
        $page_id = Setting::where('name', 'facebook_page_id')->first();
        $page_token = Setting::where('name', 'facebook_page_token')->first();

        return [
            'app_id' => $app_id->value,
            'app_secret' => $app_secret->value,
            'page_id' => $page_id->value,
            'page_token' => $page_token->value,
        ];
    }
}
