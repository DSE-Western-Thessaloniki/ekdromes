<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'allow_school_access' => ['in:0,1', 'required'],
            'no_school_access_text' => ['string', 'nullable'],
            'show_notes_on_login' => ['in:0,1', 'required'],
            'login_notes' => ['string', 'nullable'],
        ];
    }
}
