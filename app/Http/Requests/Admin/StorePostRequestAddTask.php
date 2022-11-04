<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestAddTask extends FormRequest
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
            'selectUser'=>'required',
            'title'=>'required|string|max:100',
            'description'=>'required|string|max:300',
            'dateOd'=>'required|date|before:dateDo',
            'dateDo'=>'required|date|after:dateOd',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Proszę wpisać tytuł',
            'description.required'=>'Proszę wpisać opis',
            'title.string'=>'Tytuł powinien składać się z ciągu znaków',
            'description.string'=>'Opis powinien składać się z ciągu znaków',
            'title.max'=>'Tytuł powinien składać się maksymalnie z 100 znaków',
            'description.max'=>'Opis powinien składać się maksymalnie z 300 znaków',
            'selectUser.required'=>'Proszę wybrać pracownika',
            'dateDo.after'=>'Termin zakończenia musi być większy niż termin rozpoczęcia zadania',
            'dateDo.required'=>'Proszę podać termin zakończenia zadania',
            'dateOd.before'=>'Termin rozpoczęcia musi być mniejszy niż termin zakończenia',
            'dateOd.required'=>'Proszę podać termin rozpoczęcia zadania'
        ];
    }
}
