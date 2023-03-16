<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question'  => ['required', 'string', 'max:2000'],
            'answer'    => ['required', 'string', 'max:65000'],
            'faq_id'    => ['nullable', 'string', 'max:100']
        ];
    }
}
