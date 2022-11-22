<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestUserData extends FormRequest
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
            'country'=>'required|string|',
            'address'=>'required|string',
            'city'=>'required|string|',
            'zip_code'=>'required',
            'province'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'country.required'=>'Proszę podać  kraj zamieszkania',
            'address.required'=>'Proszę podać adres zamieszkania',
            'city.required'=>'Proszę podać miasto zamieszkania',
            'zip_code.required'=>'Proszę podać kod pocztowy',
            'province'=>'Proszę podać nazwę województwa'
        ];
    }
}
