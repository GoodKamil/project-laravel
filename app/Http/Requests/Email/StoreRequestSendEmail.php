<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestSendEmail extends FormRequest
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
    public function rules():array
    {
        return [
            'title'=>'required|string|min:10',
            'description'=>'required|string|min:20',
            'selectUser'=>'required|exists:users,id_U'
        ];
    }

    public function messages():array
    {
       return [
           'title.required'=>'Proszę podać tytuł wiadomości',
           'selectUser.required'=>'Proszę wybrać użytkownika',
           'selectUser.exists'=>'Wybrany użytkownik nie istnieje w systemie',
           'title.min'=>'Tytuł powinien składać sie minimum z 10 znaków',
           'description.required'=>'Proszę podać treść wiadomości',
           'description.min'=>'Wiadomośc powinna składać sie minimum z 20 znaków',
       ];
    }
}
