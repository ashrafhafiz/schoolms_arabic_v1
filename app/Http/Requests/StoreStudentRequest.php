<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email,' . $this->id,
            'password' => 'required|string|min:6|max:10',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'blood_type_id' => 'required',
            'dob' => 'required|date|date_format:Y-m-d',
            'level_id' => 'required',
            'grade_id' => 'required',
            'section_id' => 'required',
            'guardian_id' => 'required',
            'academic_year' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('validation.required'),
            'name_en.required' => __('validation.required'),
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique'),
            'password.required' => __('validation.required'),
            'gender_id.required' => __('validation.required'),
            'nationality_id.required' => __('validation.required'),
            'blood_type_id.required' => __('validation.required'),
            'dob.required' => __('validation.required'),
            'level_id.required' => __('validation.required'),
            'grade_id.required' => __('validation.required'),
            'section_id.required' => __('validation.required'),
            'guardian_id.required' => __('validation.required'),
            'academic_year.required' => __('validation.required'),
        ];
    }
}
