<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'thumb' => 'required'
            //
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không đc bỏ trống',
            'thumb.required' => 'ảnh không được bỏ trống'
            //
        ];
    }
}
