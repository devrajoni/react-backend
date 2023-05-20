<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequestForm extends FormRequest
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
            'company_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
            ],
            'phone' => [
                'required',
                'max:255',
            ],
            'company_logo' => [
                $this->setting ? 'nullable' : 'required',
            ],
            'favicon' => [
                $this->setting ? 'nullable' : 'required',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'map' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'landing_description' => [
                'required',
            ],
            'copyright_name' => [
                'required',
                'max:255',
            ],
            'copyright_year' => [
                'required',
                'max:255',
            ],
            'copyright_link' => [
                'required',
            ],
        ];
    }
}
