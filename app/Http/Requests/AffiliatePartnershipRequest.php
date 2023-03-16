<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffiliatePartnershipRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:50'],
            'email'         => ['required', 'string', 'max:50'],
            'company_name'  => ['required', 'string', 'max:100'],
            'phone_no'      => ['required', 'string', 'max:30'],
            'attachment'    => ['nullable', 'mimes:pdf,jpg,jpeg,png', 'max:1080'],
            'message'       => ['nullable', 'string', 'max:65000']
        ];
    }
}
