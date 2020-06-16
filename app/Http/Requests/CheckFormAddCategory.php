<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckFormAddCategory extends FormRequest
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
            'name' => 'required|unique:categories|min:6|max:255'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Bạn chưa nhập tên danh mục',
          'name.unique' => 'Danh mục trùng tên rồi',
          'name.min' => 'Tên danh mục quá ngắn',
          'name.max' => 'Tên danh mục quá dài'
        ];
    }
}
