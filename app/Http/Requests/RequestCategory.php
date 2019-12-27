<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'cate_name' => 'required|unique:categories,cate_name,' . $this->id,
//            'cate_avatar'   => 'required|mimes:jpeg,jpg,png,gif',

        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Trường này không được để trống',
            'cate_name.unique'   => 'Tên danh mục đã tồn tại',
            'cate_avatar.required' => 'Trường này không được để trống',
//            'cate_avatar.mimes' => 'File phải là file ảnh',
        ];
    }
}
