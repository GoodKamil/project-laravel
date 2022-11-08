<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StorePostRequestCheckEmail;
use App\Repository\EmailRepository;

class CheckEmailController extends Controller
{
    private EmailRepository $repository;
    public function __construct(EmailRepository $repository)
    {
         $this->repository=$repository;
    }

    public function showCheckEmailForm()
    {
        return view('auth.registerEmail');
    }

    public function checkEmailIsExists(StorePostRequestCheckEmail $request)
    {
        $request->except(['_token']);
        $request->validated();
        $result=$this->repository->get($request->checkEmail)->toArray();
        return view('auth.register',['result'=>$result]);
    }
}
