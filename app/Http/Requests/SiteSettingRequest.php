<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteSettingRequest extends FormRequest
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
            'site_name'             => ['required', 'string', 'max:30'],
            'short_desc'            => ['required', 'string', 'max:300'],
            'contact_no'            => ['required', 'string', 'max:20'],
            'email'                 => ['required', 'email', 'max:50'],
            'facebook_link'         => ['nullable', 'url', 'max:5000'],
            'instagram_link'        => ['nullable', 'url', 'max:5000'],
            'twitter_link'          => ['nullable', 'url', 'max:5000'],
            'youtube_link'          => ['nullable', 'url', 'max:5000'], 
            'header_logo'           => ['nullable', 'mimes:jpg,jpeg,png', 'max:1080', Rule::requiredIf(empty($this->all()['setting_id']))],
            'footer_logo'           => ['nullable', 'mimes:jpg,jpeg,png', 'max:1080', Rule::requiredIf(empty($this->all()['setting_id']))],
            'favicon'               => ['nullable', 'mimes:jpg,jpeg,png', 'max:1080', Rule::requiredIf(empty($this->all()['setting_id']))],
            'old_header_logo'       => ['nullable'],
            'old_footer_logo'       => ['nullable'],
            'old_favicon'           => ['nullable'],
        ];
    }
}
