<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'purpose'       => ['required', 'string', 'max:50'],
            'property_type' => ['required', 'string', 'max:50'],
            'city_id'       => ['required', 'string', 'max:100'],
            'address'       => ['required', 'string', 'max:3000'],
            'area_size'     => ['required', 'integer'],
            'area_size_unit'=> ['required', 'string', 'max:30'],
            'price'         => ['required', 'integer'],
            'bedrooms'      => ['required', 'integer', 'max:100'],
            'bathrooms'     => ['required', 'integer', 'max:100'],
            'image'         => ['required', 'mimes:jpg,jpeg,png', 'max:1000'],
            'image_arr'     => ['nullable', 'array'],
            'image_arr.*'   => ['mimes:jpg,jpeg,png', 'max:1000'],
            'title'         => ['required', 'string', 'max:1000'],
            'description'   => ['nullable', 'string', 'max:65000'],
            'email'         => ['required', 'email', 'max:50'],
            'contact_no'    => ['required', 'string', 'max:20']
        ];
    }
}
