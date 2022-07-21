<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|min:6|max:14|unique:admins,username',
            'email'=>'required|min:10|max:25|unique:admins,email|email',
            'avatar'=>'nullable|mimes:png,jpg,jpeg',
            'password'=>'required|max:15,|min:8|confirmed|string'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if(auth()->guard('admin')->user()->hasPermssion('create-admin'))
        return true;
    }
}
