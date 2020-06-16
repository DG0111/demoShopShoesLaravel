<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckFormEditProduct extends FormRequest
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
            'category_id' => 'required|integer',
            'name' => 'required|max:50|min:6',
            'description' => 'required|max:255|min:6',
            'price' => 'required|min:0',
            'promotion_price' => 'min:0',
            'quantity' => 'required|min:0',
            'image_id' => 'required', // chức năng nếu người dùng không sửa Ảnh thì xóa giòng này
            'image_id.*' => 'image|mimes:jpg,jpeg|max:2048',
            'size.*' => 'integer',
            'size' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'size_id.integer' => 'Mời bạn chọn size',
            'size_id.required' => 'Mời bạn chọn size',
            'image_id.max' => 'Dung lượng file quá lơn',
            'image_id.mimes' => 'Chọn đúng file image " jpg,jpeg "',
            'image_id.required' => 'Chọn ảnh sản phẩm',
            'quantity.required' => 'Nhập số lượng sản phẩm',
            'quantity.min' => 'Số lượng sản phẩm lớn hơn 0',
            'price.required' => 'Nhập giá sản phẩm',
            'price.min' => 'Giá sản phẩm lớn hơn 0',
            'promotion_price.min' => 'Giảm giá sản phẩm lớn hơn 0',
            'category_id.required' => 'Phải chọn danh mục !',
            'category_id.integer' => 'Danh mục không tồn tại !',
            'name.required' => 'Phải nhập tên sản phẩm !',
            'name.max' => 'Tên sản phẩm từ 6 đến 50 kí tự !',
            'name.min' => 'Tên sản phẩm từ 6 đến 50 kí tự !',
            'description.required' => 'Phải nhập mô tả ngắn !',
            'description.max' => 'Mô tả từ 6 đến 255 kí tự !',
            'description.min' => 'Mô tả từ 6 đến 255 kí tự !',
        ];
    }
}
