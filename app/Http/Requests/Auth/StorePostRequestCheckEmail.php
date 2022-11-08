<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequestCheckEmail extends  FormRequest
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
            'checkEmail'=>['required','email:', Rule::exists('email_users', 'email')
                ->where('used', 0)],

        ];
    }

    public function messages()
    {
        return [
            'checkEmail.required'=>'Proszę podać adres e-mail',
            'checkEmail.email'=>'Proszę podać prawidłowy adres e-mail',
            'checkEmail.exists'=>'Adres e-mail nie istnieje w bazie danych lub został już użyty'
        ];
    }
}

