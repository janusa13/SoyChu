<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        return [
            'code' => 'required|string|max:50|unique:products,code,'.$this->product->id,
            'nombre' => 'required|string|max:250',
            'cantidad' => 'required|integer|min:1|max:10000',
            'precio' => 'required',
            'descripcion' => 'nullable|string'
        ];
    }
}