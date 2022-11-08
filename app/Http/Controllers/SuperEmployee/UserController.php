<?php

namespace App\Http\Controllers\SuperEmployee;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class UserController extends  Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

    public function index():view
    {
        return view('superemployeer.users.index',[
            'users'=>$this->repository->allEmployee()
        ]);
    }
}
