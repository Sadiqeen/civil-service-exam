<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\UpdateSetting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_id = Setting::where('name', 'facebook_app_id')->first();
        $app_secret = Setting::where('name', 'facebook_app_secret')->first();
        $page_id = Setting::where('name', 'facebook_page_id')->first();
        $page_token = Setting::where('name', 'facebook_page_token')->first();

        return view('setting.index', [
            'app_id' => $app_id,
            'app_secret' => $app_secret,
            'page_id' => $page_id,
            'page_token' => $page_token,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSetting $request)
    {
        $facebook_app_id = Setting::where('name', 'facebook_app_id')->first();
        $facebook_app_id->value = $request->facebook_app_id;
        $facebook_app_id->save();

        $facebook_app_secret = Setting::where('name', 'facebook_app_secret')->first();
        $facebook_app_secret->value = $request->facebook_app_secret;
        $facebook_app_secret->save();

        $facebook_page_id = Setting::where('name', 'facebook_page_id')->first();
        $facebook_page_id->value = $request->facebook_page_id;
        $facebook_page_id->save();

        $facebook_page_token = Setting::where('name', 'facebook_page_token')->first();
        $facebook_page_token->value = $request->facebook_page_token;
        $facebook_page_token->save();

        toast('Update setting success', 'success');
        return redirect()->route('setting.index');
    }
}
