<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequestEdit extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'position'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'Proszę podać imię',
            'last_name.required'=>'Proszę podać nazwisko',
            'position.required'=>'Proszę wybrać stanowisko'
        ];
    }
}
