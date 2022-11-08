<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

    public function __invoke()
    {
        $getUser=$this->repository->get(auth::id());
        return view('home.main',['user'=>$getUser]);
    }
}
