<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrcamentoRequest extends FormRequest
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

    public function messages(){
        return [
            'vendedor.required' => 'O nome do vendedor deve ser preenchido',
            'cliente.required' => 'O nome do cliente deve ser preenchido',
            'descricao.required' => 'A descrição deve ser preenchida',
            'valorOrcado.required' => 'O valor orçado deve ser preenchido',

            'vendedor.max' => 'O nome do vendedor deve ter no maximo 255 caracteres',
            'cliente.max' => 'O nome do cliente deve ter no maximo 255 caracteres',
            'descricao.max' => 'A descrição deve ter no maximo 1000 caracteres'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vendedor' => 'required|max:255',
            'cliente' => 'required|max:255',
            'descricao' => 'required|max:1000',
            'valorOrcado' => 'required'
        ];
    }
}
