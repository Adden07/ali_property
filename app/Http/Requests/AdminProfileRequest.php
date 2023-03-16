<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AdminProfileRequest extends FormRequest
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
            'name'                  => ['required', 'string', 'max:191', Rule::unique('admins')->ignore(hashids_decode($this->all()['admin_id']))],
            'username'              => ['required', 'string', 'max:191', Rule::unique('admins')->ignore(hashids_decode($this->all()['admin_id']))],
            'email'                 => ['required', 'email', 'max:191'],
            'image'                 => ['nullable', 'max:1080', 'mimes:jpg,png,jpeg'],
            'current_password'      => ['nullable', 'max:100', Rule::requiredIf(!empty($this->all()['password'])), 'current_password:vendor'],
            'password'              => ['nullable', 'min:8', 'max:100', Rule::requiredIf(!empty($this->all()['current_password'])), 'confirmed'],

        ];
    }
}
