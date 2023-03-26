<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatedUsersRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'login' => 'string|max:255|unique:users,login',
            'admin' => 'boolean|required',
            'email' => 'string|email|max:255|unique:users,',
            'password' => 'required|string|min:4|confirmed',
        ];

        if ($this->method() === 'PATCH') {
            $rules['password'] = 'nullable|string|min:4|confirmed';
            $rules['email'] = 'required|string|email|max:255' . Rule::unique('users')->ignore($this->user);
        }

        return $rules;
    }
}