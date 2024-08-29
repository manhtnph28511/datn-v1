<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    if ($this->isMethod('post')) {
        return [
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image_variant' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Xác thực hình ảnh
        ];
    } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
        return [
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image_variant' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Xác thực hình ảnh
        ];
    }
}

}
