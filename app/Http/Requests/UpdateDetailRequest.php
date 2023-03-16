<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDetailRequest extends FormRequest
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
            'full_name'              => ['required', 'string', 'max:50'],
            'current_password'       => ['nullable', 'max:50', 'current_password:web'],
            'password'               => ['nullable', 'min:8', 'max:50', 'confirmed', Rule::requiredIf(!empty($this->all()['current_password']))]
        ];
    }

    public function messages(){
        return [
            'current_password.current_password' => 'Curent password does not match'
        ];
    }
}
