<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingleServiceBannerRequestForm extends FormRequest
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
            // 'title' => [
            //     'required',
            //     'max:255',
            // ],

            // 'sub_title' => [
            //     'required',
            //     'max:255',
            // ],

            // 'description' => [
            //     'nullable',
            // ],

            'image' => [
                $this->single_service_banner ? 'nullable' : 'required',
                'image',
                
            ],
        ];
    }
}
