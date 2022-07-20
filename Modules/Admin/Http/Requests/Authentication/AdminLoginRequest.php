<?php

namespace Modules\Admin\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|exists:admins,email|min:8|max:30|email',
            'password'=> 'required|max:15,|min:8'
        ];
    }

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
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'email.required' => 'Email  is required',
        'email.exists' => 'Email  is invalid',
        'password.required'  => 'Password is required',

    ];
}
}
