<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StorePostRequestUserData;
use App\Repository\UserDataRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserRepository $repository;
    private UserDataRepository $repositoryUserData;
    public function __construct(UserRepository $repository,UserDataRepository $repositoryUserData)
    {
        $this->repository=$repository;
        $this->repositoryUserData=$repositoryUserData;
    }



}
