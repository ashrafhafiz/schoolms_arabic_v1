<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_en' => 'required|unique:levels,name->en,' . $this->id,
            'name_ar' => 'required|unique:levels,name->ar,' . $this->id,
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
