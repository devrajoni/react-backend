<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'max:255',
            ],
            'last_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
            ],
            'subject' => [
                'required',
                'max:255',
            ],
            'message' => [
                'nullable',
            ],
        ];
    }
}
