<?php

namespace Modules\Order\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class Payment extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key'=>'required|string',
            'secret'=>'required|string',
            'username'=>'nullable|string',
            'password'=>'nullable|string',
            'cetrificate'=>'nullable|string',
            'currency'=>'nullable|string|max:4|min:2'

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
}
