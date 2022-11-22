<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestHandOverTheTask extends FormRequest
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
            'comment'=>'required|string|min:10',
            'formFile'=>'nullable|file|mimes:doc,docx,pdf,txt,png,jpg,jpeg,csv',
            'idT'=>'exists:user_tasks,id_T'
        ];
    }

    public function messages():array
    {
      return [
          'comment.required'=>'Proszę napisać komentarz do zadania',
          'comment.min'=>'Komentarz powinien składać sie miniumum z 10 znaków',
          'formFile.mimes'=>'Akceptowane rozszerzenia pliku (doc,docx,pdf,txt,png,jpg,jpeg,csv)',
          'formFile.file'=>'Proszę przeszłać plik'
      ];
    }
}
