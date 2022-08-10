<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatedServiceDeskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'tecnico_id' => ['required', 'integer'],
            'parecer_tecnico' => ['required', 'string', 'max:255'],
        ];
    }
}