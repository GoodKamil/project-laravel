<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequestEdit;
use App\Http\Requests\Admin\StorePostRequestAddUser;
use App\Models\EmailUsers;
use App\Models\Positions;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

     public function index():view
    {

       return view('admin.index',[
         'users'=>$this->repository->all()
       ]);
    }

    public function create():view
    {
        return view('admin.create',[
            'positions'=>Positions::all()
        ]);
    }

    public function store(StorePostRequestAddUser $request):RedirectResponse
    {
        $request->except(['_token']);
        $request->validated();
        EmailUsers::create([
            'email'=>$request->user_email,
            'id_P'=>$request->position,
            'created_at'=>Carbon::now()
        ]);
        return redirect('/user');
    }


    public function show(int $idU):view
    {

        return view('admin.show',[
            'user'=>$this->repository->get($idU)
        ]);
    }

    public function edit(int $idU):view
    {
        return view('admin.edit',[
            'user'=>$this->repository->get($idU),
            'positions'=>Positions::all()
        ]);
    }

    public function update(PostRequestEdit $request ,int $idU):RedirectResponse
    {
        $request->except(['_token']);
        $request->validated();
        $params=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'position'=>$request->position
        ];
        $this->repository->update($idU,$params);
        return redirect('/user');

    }


    public function delete():view
    {
        return view('admin.list',[
            'users'=>$this->repository->all()
        ]);
    }


}
