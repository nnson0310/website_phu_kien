<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class TagsRequest extends FormRequest
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
        $tags_id = $request->tags_id;
        return [
            //
            'tags_name' => 'bail | required | max: 20 | unique:tbl_tags,name,'.$tags_id.',id',
        ];
    }

    public function messages(){
        return [
            //
            'tags_name.required' => 'Tên thẻ không được để trống',
            'tags_name.max' => "Tên thẻ không được vượt quá 20 kí tự",
            'tags_name.unique' => "Tên thẻ đã tồn tại. Vui lòng thử lại"
        ];
    }
}
