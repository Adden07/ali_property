<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelTourBookingRequest extends FormRequest
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
            'name'              => ['required', 'max:50'],
            'email'             => ['required', 'max:50'],
            'phone_no'          => ['required', 'max:50'],
            'travel_date'       => ['required', 'date'],
            'departure_city'    => ['required', 'max:100'],
            'infant_variation'  => ['nullable', 'max:32000'],
            'child_variation'   => ['nullable', 'max:32000'],
            'adult_variation'   => ['nullable', 'max:32000', 'required_without_all:infant_variation,child_variation'],
            'dinner_variation'  => ['nullable', 'max:32000'],
            'timing'            => ['required', 'in:evening,morning'],
            'add_on_arr'        => ['array'],
            'vendor_package_id' => ['required', 'string']
        ];
    }
}
