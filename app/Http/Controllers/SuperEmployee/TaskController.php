<?php

namespace App\Http\Controllers\SuperEmployee;

use App\Http\Requests\Admin\StorePostRequestAddTask;
use App\Repository\TasksRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TaskController extends  Controller
{

    private UserRepository $userRepository;
    private TasksRepository $tasksRepository;
    public function __construct(UserRepository $userRepository,TasksRepository $tasksRepository)
    {
        $this->userRepository=$userRepository;
        $this->tasksRepository=$tasksRepository;
    }

    public function index()
    {
        return view('superemployeer.task.index',
            ['tasks'=>$this->tasksRepository->allEmployee(auth::id())]);
    }

    public function create()
    {
        return view('superemployeer.task.create',
            ['users'=>$this->userRepository->all(auth::id())]);
    }

    public function store(StorePostRequestAddTask $request)
    {
        $params=$this->helperMethod($request);
        $this->tasksRepository->insert($params);
        return redirect(route('super.task.index'));

    }

    public function helperMethod(StorePostRequestAddTask  $request):array
    {
        $request->except(['_token']);
        $request->validated();
        return [
            'id_U'=>$request->selectUser,
            'Title'=>$request->title,
            'Description'=>$request->description,
            'DateFrom'=>$request->dateOd,
            'DateTo'=>$request->dateDo,
            'priority'=>$request->boolean('priority'),
            'whoAdd'=>auth::id(),
        ];
    }
}
