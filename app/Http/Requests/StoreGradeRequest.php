<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'List_Classes.*.name_en' => 'required',
            'List_Classes.*.name_ar' => 'required',
            'List_Classes.*.level_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('validation.required'),
            'name_ar.required' => __('validation.required'),
            'level_id.required' => __('validation.required'),
        ];
    }
}
