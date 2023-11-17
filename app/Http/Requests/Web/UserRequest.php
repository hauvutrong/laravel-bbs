<?php

namespace App\Http\Requests\Web;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read \Illuminate\Http\UploadedFile $avatar 用户头像文件
 */
class UserRequest extends FormRequest
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
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    /**
     * Prompt information after a violation of the non-rule.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'Tên người dùng đã tồn tại, vui lòng điền lại.',
            'name.regex' => 'Tên người dùng chỉ hỗ trợ tiếng Anh, số, dấu gạch dưới và dấu gạch dưới.',
            'name.between' => 'Tên người dùng phải có từ 3 - 25 ký tự.',
            'name.required' => 'Tên ngươi dung không được để trống.',
            'avatar.mimes' => 'Hình đại diện phải là ảnh ở định dạng jpeg, bmp, png hoặc gif.',
            'avatar.dimensions' => 'Hình đại diện không đủ rõ ràng và chiều rộng và chiều cao cần phải lớn hơn 200px.',
        ];
    }
}
