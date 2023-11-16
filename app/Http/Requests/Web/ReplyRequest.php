<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
            'content' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'content.min' => 'Nội dung bình luận phải có ít nhất ba ký tự.',
        ];
    }
}
