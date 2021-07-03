<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('validation.required'),
            'name_en.unique' => __('validation.unique'),
            'name_ar.required' => __('validation.required'),
            'name_ar.unique' => __('validation.unique'),
        ];
    }
}
