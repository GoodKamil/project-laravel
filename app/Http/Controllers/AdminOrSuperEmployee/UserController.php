<?php

namespace App\Http\Controllers\AdminOrSuperEmployee;

use App\Http\Requests\Admin\PostRequestEdit;
use App\Http\Requests\Admin\StorePostRequestAddUser;
use App\Models\EmailUsers;
use App\Models\Positions;
use App\Repository\EmailRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

     public function index():view
    {
       return view('AdminOrSuperEmployee.index',[
         'users'=>$this->repository->all(auth::id())
       ]);
    }

    public function create():view
    {
        return view('AdminOrSuperEmployee.create',[
            'positions'=>$this->positions()
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
        return redirect('/user')->with('success','Prawidłowo dodano użytkownika');
    }


    public function show(int $idU):view
    {

        return view('AdminOrSuperEmployee.show',[
            'user'=>$this->repository->get($idU)
        ]);
    }

    public function edit(int $idU):view
    {
        return view('AdminOrSuperEmployee.edit',[
            'user'=>$this->repository->get($idU),
            'positions'=>$this->positions()
        ]);
    }

    public function positions()
    {
        if(Auth::user()?->isAdmin())
        {
            return Positions::all();
        }
        return Positions::where('role','=',1)
            ->get();
    }

    public function update(PostRequestEdit $request ,int $idU):RedirectResponse
    {
        $request->validated();
        $params=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'position'=>$request->position
        ];
        $this->repository->update($idU,$params);
        return redirect('/user')->with('success','Pomyślnie zaktualizowano użytkownika');

    }


    public function delete(int $id,EmailRepository $emailRepository):JsonResponse
    {
        try{
            $user=$this->repository->get($id);
            $email=$emailRepository->findEmaill($user->email_user);
            $user->delete();
            $email->delete();
           return response()->json([
               'status'=>'success',
               'message'=>'Operacja wykonana pomyślnie'
           ]);
        }catch(\Exception $e){
            return response()->json([
                'status'=>'error',
                'message'=>'Wystąpił problem podczas wykonywania operacji'
            ])->setStatusCode(500);
        }
    }


}
