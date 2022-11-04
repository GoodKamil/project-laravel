<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestAddUser extends FormRequest
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
            'user_email'=>'required|string|email:rfc,dns|unique:email_users,email',
            'position'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'user_email.required'=>'Pole e-mail nie może być puste',
            'user_email.email'=>'Zły format adres e-mail',
            'user_email.unique'=>'Adres e-mail istnieje już w bazie danych',
            'position.required'=>'Proszę wybrać stanowisko'
        ];
    }
}
