<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProspectDeleteAndUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id == $this->prospect->user_id;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
