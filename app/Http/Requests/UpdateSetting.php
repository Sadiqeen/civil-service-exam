<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'facebook_app_id' => 'required|max:500',
            'facebook_app_secret' => 'required|max:500',
            'facebook_page_id' => 'required|max:500',
            'facebook_page_token' => 'required|max:500',
        ];
    }
}
