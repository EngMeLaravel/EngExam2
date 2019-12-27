<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSubCategory extends FormRequest
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
            'subcate_name' => 'required|unique:categories,cate_name,' . $this->id,
            'subcate_avatar' => 'required|image',

        ];
    }

    public function messages()
    {
        return [
            'subcate_name.required' => 'Trường này không được để trống',
            'subcate_name.unique'   => 'Tên danh mục đã tồn tại',
            'subcate_avatar.required' => 'Trường này không được để trống',
            'subcate_avatar.image' => 'Trường này phải là file ảnh',
        ];
    }
}
