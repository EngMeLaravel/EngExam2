<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVocabulary extends FormRequest
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
            'voca_name' => 'required',
            'voca_mean' => 'required',
            'voca_spell' => 'required',
            'voca_type' => 'required',
            'voca_example_en' => 'required',
            'voca_example_vi' => 'required',
            'cate_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'voca_name.required' => 'Trường này không được để trống',
            'voca_mean.required' => 'Trường này không được để trống',
            'voca_spell.required' => 'Trường này không được để trống',
            'voca_type.required' => 'Trường này không được để trống',
            'voca_example_en.required' => 'Trường này không được để trống',
            'voca_example_vi.required' => 'Trường này không được để trống',
            'cate_id.required' => 'Trường này không được để trống',
        ];
    }
}
