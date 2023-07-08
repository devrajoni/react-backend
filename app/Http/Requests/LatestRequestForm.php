<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LatestRequestForm extends FormRequest
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
            'title' => [
                'required',
                'max:255',
            ],
            'long_description' => [
                'nullable',
                
            ],
            'image' => [
                $this->latest ? 'nullable' : 'required',
                'image',
            ],
            'status' => [
                'required',   
            ],
        ];
    }
}
