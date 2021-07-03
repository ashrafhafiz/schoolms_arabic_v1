<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|unique:teachers,email,' . $this->id,
            'password' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'join_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique'),
            'password.required' => __('validation.required'),
            'name_ar.required' => __('validation.required'),
            'name_en.required' => __('validation.required'),
            'specialization_id.required' => __('validation.required'),
            'gender_id.required' => __('validation.required'),
            'join_date.required' => __('validation.required'),
            'address.required' => __('validation.required'),
        ];
    }
}
