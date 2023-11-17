<?php

namespace App\Http\Requests\Api;

/**
 * @property string $title 话题标题
 * @property string $body 话题内容
 * @property int $category_id 话题分类
 */
class TopicRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'title' => 'required|string|min:2',
                    'body' => 'required|string|min:3|max:65535',
                    'category_id' => 'required|exists:categories,id',
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'required|string|min:2',
                    'body' => 'required|string|min:3|max:65535',
                    'category_id' => 'required|exists:categories,id',
                ];
                break;
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Tên chủ đề',
            'body' => 'Nội dung chủ đề',
            'category_id' => 'Phân loại chủ đề',
        ];
    }

    /**
     * Prompt information after a violation of the non-rule.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.min' => 'Chủ đề phải có ít nhất hai ký tự.',
            'body.required' => 'Nội dung không được để trống.',
            'body.min' => 'Nội dung phải có ít nhất ba ký tự.',
            'body.max' => 'Nội dung quá dài hoặc hình ảnh quá khổ được tải lên (vui lòng cắt và tải lên hình ảnh quá khổ).',
            'category_id.required' => 'Danh mục bắt buộc.',
        ];
    }
}
