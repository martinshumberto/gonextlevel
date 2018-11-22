<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cpf' => 'required|string',
            'birth_date' => 'required|date',
        ];
    }

    public function address()
    {
        return $this->address;
    }
}
