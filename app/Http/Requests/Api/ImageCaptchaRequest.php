<?php

namespace App\Http\Requests\Api;

/**
 * @property string $phone 手机号码
 */
class ImageCaptchaRequest extends FormRequest
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
            'phone' => 'required|phone:CN,mobile|unique:users',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => 'Số điện thoại di động không được để trống.',
            'phone.phone' => 'Định dạng số điện thoại không chính xác.',
            'phone.unique' => 'Số điện thoại di động đã tồn tại.',
        ];
    }
}
