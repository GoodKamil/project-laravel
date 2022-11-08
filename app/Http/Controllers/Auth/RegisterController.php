<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\EmailRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    private UserRepository $userRepository;
    private EmailRepository $emailRepository;
    public function __construct(UserRepository $userRepository,EmailRepository $emailRepository)
    {
        $this->middleware('guest');
        $this->userRepository=$userRepository;
        $this->emailRepository=$emailRepository;
    }


    public  function register(Request $request)
    {
        $request->except(['_token']);

        $validator=Validator::make($request->all(),$this->rules(),$this->messages());
        if ($validator->fails()) {
            return view('auth.register', ['result' => $request->all()])->withErrors($validator);
        }

        $params=$this->getParams($request->all());
        return $this->create($params);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     */
    protected function create(array $data)
    {
        $this->userRepository->insert($data);
        return $this->updateEmailUsed($data['email_user'],['used'=>1]);
    }

    protected function getParams(array $data)
    {
        return [
            'first_name' => $data['name'],
            'last_name'=>$data['lastName'],
            'email_user' => $data['id_E'],
            'position' => $data['id_P'],
            'password' => Hash::make($data['password']),
        ];
    }

    public function updateEmailUsed(int $idEmail,array $params)
    {
          $this->emailRepository->update($idEmail,$params);
          return redirect(route('login'));
    }

    private function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'lastName'=>['required','string'],
            'email' => [Rule::exists('email_users', 'email')
                ->where('used', 0)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    private function messages()
    {
        return [
            'name.required'=>'Proszę podać imię',
            'lastName.required'=>'Proszę podać Nazwisko',
            'email.exists'=>'Adres e-mail nie istnieje w bazie danych lub został już użyty',
            'password.required'=>'Proszę podać hasło',
            'password.min'=>'Hasło powinno składać sie minimum z 8 znaków',
            'password.confirmed'=>'Hasła muszą być takie same'
        ];
    }
}
