<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|min:2',
                        'category_id' => 'required|numeric',
                        'body' => 'required|min:3|max:65535',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                return [];
        }
    }

    /**
     * Prompt information after a violation of the non-rule.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.min' => 'Chủ đề phải có ít nhất 2 ký tự.',
            'category_id.required' => 'Danh mục bắt buộc.',
            'category_id.numeric' => 'Danh mục phải là số.',
            'body.required' => 'Nội dung không được để trống.',
            'body.min' => 'Nội dung phải có ít nhất 3 ký tự.',
            'body.max' => 'Nội dung quá dài hoặc hình ảnh quá khổ được tải lên (vui lòng cắt và tải lên hình ảnh quá khổ).',
        ];
    }
}
