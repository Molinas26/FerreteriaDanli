<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionInventario extends FormRequest
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
        if($this->route('id')){
            return [
                'codigo_producto' => 'nullable|max:6|min:6|',
                'nombre_producto' => 'required|max:100',
                'precio_compra' => 'required|min:1',
                'cantidad' => 'required|min:0',
            ];
        }else{
            return [
                'codigo_producto' => 'required|max:6|min:6|unique:inventarios,codigo_producto,' . $this->route('id'),
                'nombre_producto' => 'required|max:100',
                'precio_compra' => 'required|min:1',
                'cantidad' => 'required|min:0',
            ];
        }
    }
}
