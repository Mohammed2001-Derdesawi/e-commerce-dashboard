<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
       
        return [
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
            'parent_id' => 'nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg',
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
