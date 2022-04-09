<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class BrandRequest extends FormRequest
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
        $brand_id = $request->brand_id;
        return [
            //
            'brand_name' => 'bail | required | max: 20 | unique:tbl_brand,brand_name,'.$brand_id.',brand_id',
            'brand_desc' => 'bail | required | max: 500'
        ];
    }

    public function messages(){
        return[
            'brand_name.required' => 'Tên thương hiệu không được để trống',
            'brand_name.max' => "Tên thương hiệu không được vượt quá 20 kí tự",
            'brand_name.unique' => "Tên thương hiệu đã tồn tại. Vui lòng thử lại",
            'brand_desc.required' => 'Mô tả thương hiệu không được để trống',
            'brand_desc.max' => "Mô tả thương hiệu không được vượt quá 500 kí tự"
        ];
    }

}
