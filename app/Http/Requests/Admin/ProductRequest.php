<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $currentMethod = $this->route()->getActionMethod(); // Get the action method when submitting
        $rules = [];
    
        switch ($this->method()) {
            case 'POST':
                switch ($currentMethod) {
                    case 'store':
                        $rules = [
                            'name' => 'required|string|max:255',
                            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Image is optional but must be valid if provided
                            'price' => 'required|numeric|min:0',
                            'quantity' => 'required|integer|min:1',
                            'cate_id' => 'required|exists:sub_categories,id',
                            'size_id' => 'required|exists:sizes,id',
                            'color_id' => 'required|exists:colors,id',
                            'brand_id' => 'required|exists:brands,id',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required|string|max:255',
                            'price' => 'required|numeric|min:0',
                            'quantity' => 'required|integer|min:1',
                            'cate_id' => 'sometimes|exists:sub_categories,id',
                            'size_id' => 'sometimes|exists:sizes,id',
                            'color_id' => 'sometimes|exists:colors,id',
                            'brand_id' => 'sometimes|exists:brands,id',
                        ];
                        break;
                }
                break;
            default:
                // Default rules can be added here if needed
                break;
        }
    
        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'image' => 'Ảnh',
            'price' => 'Giá',
            'quantity' => 'Số lượng',
            'cate_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'size_id' => 'Size',
            'color_id' => 'Màu',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'file' => ':attribute không đúng định dạng',
            'integer' => ':attribute không phải là số'
        ];
    }




}
