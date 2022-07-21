<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'mainimage' => 'required|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
            'category' => 'required',
            'tax' => 'nullable',
            'images' => 'required|max:10|min:1',
            'images.*' => 'mimes:png,jpg,jpeg,gif',
            'weight' => 'required',
            'dimension.width' => 'required',
            'dimension.height' => 'required',
            'dimension.length' => 'required',
            'meta.name' => 'required',
            'meta.description' => 'required',
            'meta.keywords' => 'required',
            'price' => 'nullable',
            'varients' => 'required_if:price,null'
        ];
    }

    public function validationData()
    {
//        dd(json_decode($this->request->get("product"), true));
        return json_decode($this->request->get("product"), true);
    }
}
