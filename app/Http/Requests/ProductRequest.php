<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {   
        $product_id = $request->product_id;
        return [
            //
            'product_name' => 'bail | required | max: 30 | unique:tbl_product,product_name,'.$product_id.',product_id',
            'product_desc' => 'bail | required | max: 255',
            'product_content' => 'bail | required | max: 500',
            'product_image' => 'bail | nullable | min: 6 | max: 4048',
            'product_price' => 'bail | required',
            'product_quantity' => 'bail | required | min: 1',
        ];
    }

    public function messages(){
        return[
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.max' => "Tên sản phẩm không được vượt quá 30 kí tự",
            'product_name.unique' => "Tên sản phẩm đã tồn tại. Vui lòng thử lại",
            'product_desc.required' => 'Mô tả sản phẩm không được để trống',
            'product_desc.max' => "Mô tả sản phẩm không được vượt quá 255 kí tự",
            'product_content.required' => 'Nội dung sản phẩm không được để trống',
            'product_content.max' => "Nội dung sản phẩm không được vượt quá 500 kí tự", 
            'product_image.min' => "Bạn chưa chọn đủ sáu ảnh đại diện cho sản phẩm",
            /* 'product_image.image' => "Ảnh của sản phẩm chưa đúng định dạng hỗ trợ (jpeg, png, bmp, gif, svg, webp)", */
            'product_image.max' => "Dung lượng ảnh không được vượt quá 4MB",
            'product_price.required' => "Giá sản phẩm không được để trống",
            'product_quantity.required' => "Số lượng sản phẩm không được để trống",
            'product_quantity.min' => "Số lượng tồn kho thấp nhất là 1",
        ];
    }

}
