<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Email\StoreRequestSendEmail;
use App\Mail\MailNotification;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

    public function index()
    {
        $users=$this->repository->all(auth::id());
        return view('users.email.index', [
                'users'=>$users
            ]
        );
    }

    public function send(StoreRequestSendEmail $request)
    {
        $request->validated();
        $user=$this->repository->get($request->input('selectUser'));
        $userFrom=auth::user();
        $params=[
            'user'=>"{$userFrom?->first_name} {$userFrom?->last_name}",
            'from'=>$userFrom?->email_users->email,
            'title'=>$request->title,
            'description'=>$request->description
        ];
        Mail::to($user->email_users->email)->send(new MailNotification($params));
        return redirect(route('home.mainPage'))->with('success','Pomyślnie wysłano wiadomość email');

    }
}
