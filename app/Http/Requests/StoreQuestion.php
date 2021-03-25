<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|max:255',
            'choice_1' => 'required|max:255',
            'choice_2' => 'required|max:255',
            'choice_3' => 'required|max:255',
            'choice_4' => 'required|max:255',
            'correct' => 'required|max:255',
            'subject' => 'required|exists:subjects,id|max:255',
        ];
    }
}
