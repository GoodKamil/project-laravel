<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequestAddTask;
use App\Repository\TasksRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
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
       return view('admin.task.index',
       ['tasks'=>$this->tasksRepository->all()]);
    }

    public function create():view
    {
        return view('admin.task.create',
        ['users'=>$this->userRepository->all()]
    );
    }

    public function store(StorePostRequestAddTask $request)
    {
        $params=$this->helperMethod($request);
        $this->tasksRepository->insert($params);
        return redirect(route('admin.index'));
    }

    public function edit(int $idT):view
    {
        $task=$this->tasksRepository->get($idT);
        $users=$this->userRepository->all();
        return view('admin.task.edit',['task'=>$task,'users'=>$users]);
    }

    public function update(int $idT,StorePostRequestAddTask $request)
    {
        $params=$this->helperMethod($request);
        $this->tasksRepository->update($idT,$params);
        return redirect(route('admin.task.index'));
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
            'priority'=>$request->boolean('priority')
        ];
    }
}
