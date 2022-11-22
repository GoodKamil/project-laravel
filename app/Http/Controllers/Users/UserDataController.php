<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StorePostRequestUserData;
use App\Repository\UserDataRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserDataController extends Controller
{
    private UserRepository $repository;
    private UserDataRepository $repositoryUserData;
   public function __construct(UserRepository $repository,UserDataRepository $repositoryUserData)
   {
       $this->repository=$repository;
       $this->repositoryUserData=$repositoryUserData;
   }

    public function show()
    {
        return view('users.data.show',['user'=>$this->repository->get(auth::id())]);
    }

    public function updateDataUser()
    {
        $userData=$this->repositoryUserData->get(auth::id());
        return view('users.data.updateDataUser',
            ['userData'=>$userData]
        );
    }

    public function create()
    {
        return view('users.data.createDataUser');
    }

    public function store(StorePostRequestUserData $request)
    {
        $request->validated();
        $this->repositoryUserData->save(['id_U'=>auth::id(),...$this->getParams($request->all())]);
        return redirect(route('users.data.show'));
    }

    public function doUpdateDataUser(StorePostRequestUserData $request)
    {
        $request->validated();
        $this->repositoryUserData->update(auth::id(),$this->getParams($request->all()));
        return redirect(route('users.data.show'));
    }

    public function getParams(array $params)
    {
       return array_filter($params,function($row){
           return $row !== '_token';
       },ARRAY_FILTER_USE_KEY);
    }
}
