<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Facebook\Facebook;


class FacebookController extends Controller
{
    public function postToPage($message = "Hello World")
    {
        $app_data = $this->getAppData();

        $fb = new Facebook([
            'app_id' => $app_data['app_id'],
            'app_secret' => $app_data['app_secret'],
            'default_graph_version' => 'v9.0',
        ]);

        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->post("/{$app_data['page_id']}/feed", [
                'message' => $message,
            ], $app_data['page_token']);

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
