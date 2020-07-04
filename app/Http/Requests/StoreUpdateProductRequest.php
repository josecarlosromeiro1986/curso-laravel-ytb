<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                "unique:products,name,{$id},id",
            ],
            'description' => [
                'required',
                'min:3',
                'max:10000'
            ],
            'price' => [
                'required',
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'image' => [
                'nullable',
                'image'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'name.unique' => 'O produto informado já existe',
            'image.image' => 'Imagem tem que ser do tipo imagem',
            'price.required' => 'Preço é obrigatória',
            'price.regex' => 'Formato do preço inválido',
            'description.required' => 'A descrição é obrigatório',
            'description.min' => 'A descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'A descrição deve ter no máximo 1000 caracteres',
        ];
    }
}
