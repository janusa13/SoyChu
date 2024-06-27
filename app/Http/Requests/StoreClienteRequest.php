<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nombre' => 'required|string|max:250',
            'apellido'=>'required|string|max:250',
            'provincia' =>'required|string|max:250',
            'localidad'=>'required|string|max:250',
            'calleYNumero'=>'required|string|max:250',
            'codigoPostal'=>'required|string|max:250',
            'cuit'=>'string|max:250',
            'categoriaIVA'=>'string|max:250',
            'correoElectronico'=>'string|max:250',
            'numeroCelular'=>'string|max:250',
            'celularLaboral'=>'string|max:250',
            'nombreFantasia'=>'string|max:250'
        ];
    }
}