<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequestForm extends FormRequest
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
            'name' => [
                'required',
                'max:255',
            ],
            'title' => [
                'required',
                'max:255',
            ],
            'sub_title' => [
                'required',
                'max:255',
            ],
            'sub_title' => [
                'required',
                'max:255',
            ],
            'icon' => [
                $this->service ? 'nullable' : 'required',  
            ],
            'image' => [
                $this->service ? 'nullable' : 'required',
                'image',  
            ],
            'short_description' => [
                'required',   
            ],
            'long_description' => [
                'required',   
            ],
            'status' => [
                'required',   
            ],
        ];
    }
}
