<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            //
            'title' => 'bail | required | max: 255',
            'images' => 'bail | image | max: 4048',
            'tags_id' => 'bail | required',
            'content' => 'bail | required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Tiêu đề bài viết không được bỏ trống',
            'title.max' => 'Tiêu đề bài viết không được vượt quá 255 kí tự',
            'images.image' => 'Định dạng ảnh chưa đúng',
            'images.max' => 'Dung lượng ảnh không được vượt quá 4MB',
            'tags_id.required' => 'Phải lựa chọn ít nhất 1 tags cho bài viết',
            'content.required' => 'Nội dung bài viết không được bỏ trống',
        ];
    }

}
