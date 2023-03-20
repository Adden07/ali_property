<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
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
            // 'company_name'          => ['required', 'string', 'max:100'],
            // 'contact_person_name'   => ['required', 'string', 'max:50'],
            'full_name'             => ['required', 'string', 'max:50'],
            'contact_no'            => ['required', 'string', 'max:30'],
            'email'                 => ['required', 'email', Rule::unique('vendors')->ignore(@hashids_decode(@$this->all()['vendor_id']))],
            'password'              => ['nullable', 'min:8', 'max:100', Rule::requiredIf(empty($this->all()['vendor_id'])), 'confirmed'],
            // 'business_type'         => ['required', 'string', 'max:30'],
            'country'               => ['required', 'string', 'max:50'],
            'state'                 => ['required', 'string', 'max:50'],
            'cities.*'              => ['required', 'string', 'max:50'],
            'image'                 => ['nullable', 'max:1080', 'mimes:jpg,png,jpeg', Rule::requiredIf(empty($this->all()['vendor_id']))],
            'vendor_id'             => ['nullable', 'string', 'max:100']
        ];
    }

    public function messages(){
        return [
            'image.max' => 'Could not upload the image greater than 1 MB'
        ];
    }
}
