<?php

namespace App\Http\Requests;

use App\Rules\ArrayIndexRequired;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PackageRequest extends FormRequest
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
    {   //dd($this->all());
        return [
            'country_id'        => ['required', 'string', 'max:100'],
            'pkg_type_id'       => ['required', 'string', 'max:100'],
            'title'             => ['required', 'string', 'max:100'],
            'is_infant'         => ['nullable', 'in:0,1'],
            'is_child'          => ['nullable', 'in:0,1'],
            'is_adult'          => ['nullable', 'in:0,1'],
            'is_dinner'         => ['nullable', 'in:0,1'],
            'infant'            => ['nullable', Rule::requiredIf(isset($this->all()['is_infant'])), 'integer'],
            'child'             => ['nullable', Rule::requiredIf(isset($this->all()['is_child'])), 'integer'],
            'adult'             => ['nullable', Rule::requiredIf(isset($this->all()['is_adult'])), 'integer', 'required_without_all:infant,child'],
            'dinner'            => ['nullable', Rule::requiredIf(isset($this->all()['is_dinner'])), 'integer'],
            'description'       => ['required', 'string', 'max:16777200'],
            'image'             => ['nullable', Rule::requiredIf(empty($this->all()['package_id'])), 'max:1080', 'mimes:jpg,png,jpeg'],
            'is_morning'        => ['nullable', 'in:0,1'],
            'is_evening'        => ['nullable', 'in:0,1'],
            'morning_title'     => ['nullable', 'array', new ArrayIndexRequired($this->all()['morning_title'], $this->all()['morning_price'], 'morning', intval(@$this->all()['is_morning']))],
            'morning_title.*'   => ['nullable', 'string', 'max:100'],
            'morning_price'     => ['nullable', 'array'],
            'morning_price'     => ['nullable', 'min:1'],
            'evening_title'     => ['nullable', 'array', new ArrayIndexRequired($this->all()['evening_title'], $this->all()['evening_price'], 'evening', intval(@$this->all()['is_evening'])) ],
            'evening_title.*'   => ['nullable', 'string','max:100'],
            'evening_price'     => ['nullable', 'array'],
            'evening_price'     => ['nullable', 'min:1'],
            'image_arr'         => ['array'],
            'image_arr.*'       => ['nullable', 'max:1080', 'mimes:jpg,jpeg,png'],
            'package_id'        => ['nullable', 'string', 'nullable']
        ];
        
    }

    protected function prepareForValidation()
    {   
        if(!isset($this->all()['is_morning'])){//set null to these arrays when morning is not set
            $this->merge([
                'morning_title' => NULL,
                'morning_price' => NULL,
            ]);
        }
        if(!isset($this->all()['is_evening'])){//set null to these arrays evening is not set
            $this->merge([
                'evening_title' => NULL,
                'evening_price' => NULL,
            ]);
        }
    }

    // public function attributes(){
    //     return [
    //         'image_arr.*' => 'Package image'
    //     ];
    // }


}
