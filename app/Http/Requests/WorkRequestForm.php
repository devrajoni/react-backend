<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequestForm extends FormRequest
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
            'category_id' => [
                'required',
            ],
            'title' => [
                'required',
                'max:255',
            ],
            'author' => [
                'required',
                'max:255',
            ],
            'client' => [
                'required',
                'max:255',
            ],
            'date' => [
                'required',
                'max:255',
            ],
            'description' => [
                'nullable',
            ],
            'image' => [
                $this->work ? 'nullable' : 'required',
                'image',   
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
