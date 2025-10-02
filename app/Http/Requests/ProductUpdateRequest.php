<?php

namespace App\Http\Requests;

class ProductUpdateRequest extends BaseRequest
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
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'code' => 'string|max:100',
            'price' => 'numeric',
            'product_category_id' => 'integer|exists:product_categories,id'
        ];
    }
}
