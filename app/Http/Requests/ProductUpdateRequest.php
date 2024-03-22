<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'category_id' => 'required',
            'brand_id' => 'required',
            'size_id' => 'required',
            'description' => 'required|min:3',

            'price' => "required",
            'is_discounted' => 'required',
            'discount' => 'required',

            'product_condition' => 'required',
            'listing_location' => 'required',
            'phone_number' => 'required|min:11'
        ];
    }
}
