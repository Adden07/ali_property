<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorProfileRequest extends FormRequest
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
            'company_name'          => ['required', 'string', 'max:100'],
            'contact_person_name'   => ['required', 'string', 'max:50'],
            'contact_no'            => ['required', 'string', 'max:30'],
            'image'                 => ['nullable', 'max:1080', 'mimes:jpg,png,jpeg'],
            'current_password'      => ['nullable', 'max:100', Rule::requiredIf(!empty($this->all()['password'])), 'current_password:vendor'],
            'password'              => ['nullable', 'min:8', 'max:100', Rule::requiredIf(!empty($this->all()['current_password'])), 'confirmed'],

        ];
    }
}
