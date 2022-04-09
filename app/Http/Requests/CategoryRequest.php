<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryRequest extends FormRequest
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
        $cat_id = $request->cat_id;
        return [
            //
            'cat_name' => 'bail | required | max: 20 | unique:tbl_category,cat_name,'.$cat_id.',cat_id',
            'cat_desc' => 'bail | required | max: 255'
        ];
    }

    public function messages(){
        return[
            'cat_name.required' => 'Tên danh mục không được để trống',
            'cat_name.max' => "Tên danh mục không được vượt quá 20 kí tự",
            'cat_name.unique' => "Tên danh mục đã tồn tại. Vui lòng thử lại",
            'cat_desc.required' => 'Mô tả danh mục không được để trống',
            'cat_desc.max' => "Mô tả danh mục không được vượt quá 255 kí tự"
        ];
    }

}
