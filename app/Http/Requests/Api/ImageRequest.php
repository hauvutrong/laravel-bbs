<?php

namespace App\Http\Requests\Api;

/**
 * @property string $type 图片类型
 * @property object $image 上传图片
 */
class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type' => 'required|string|in:avatar,topic',
        ];

        if ($this->type === 'avatar') {
            $rules['image'] = 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200';
        } else {
            $rules['image'] = 'required|mimes:jpeg,bmp,png,gif';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.dimensions' => 'Hình ảnh không đủ rõ ràng và cần có chiều rộng và chiều cao lớn hơn 200px.',
        ];
    }
}
