<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SoftwareServiceRequest extends FormRequest
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
            'service_name'          => ['required', 'string', 'max:300'],
            'short_desc'            => ['required', 'string', 'max:1000'],
            'long_desc'             => ['required', 'string', 'max:65000'],
            'is_form'               => ['nullable', 'in:0,1'],
            'image'                 => ['nullable', 'max:1080', 'mimes:jpg,png,jpeg', Rule::requiredIf(empty($this->all()['software_service_id']))],
            'software_service_id'   => ['nullable']
        ];
    }
}
