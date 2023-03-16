<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminReviewRequest extends FormRequest
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
            'package_id'        => ['required', 'string', 'max:100'],
            'username'          => ['required', 'string', 'max:50'],
            'review'            => ['required', 'string', 'max:65000'],
            'rating'            => ['required'],
            'admin_review_id'   => ['nullable']
        ];
    }
}
