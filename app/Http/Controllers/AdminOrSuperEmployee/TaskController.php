<?php

namespace App\Http\Controllers\AdminOrSuperEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequestAddTask;
use App\Repository\TasksRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
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
       return view('AdminOrSuperEmployee.task.index',
       ['tasks'=>$this->getTask()]);
    }

    public function getTask()
    {
        if(Auth::user()?->isAdmin())
        {
            return $this->tasksRepository->all();
        }
        return $this->tasksRepository->userTasks(auth::id());
    }

    public function create():view
    {
        return view('AdminOrSuperEmployee.task.create',
        ['users'=>$this->getUsers()]
    );
    }

    public function getUsers()
    {
        if(Auth::user()?->isAdmin())
        {
            return $this->userRepository->all(auth::id());
        }
        return $this->userRepository->allEmployee();
    }

    public function store(StorePostRequestAddTask $request)
    {
        $params=$this->helperMethod($request);
        $this->tasksRepository->insert($params);
        return redirect(route('AdminOrSuperEmployee.index'));
    }

    public function edit(int $idT):view
    {
        $task=$this->tasksRepository->get($idT);
        $users=$this->getUsers();
        return view('AdminOrSuperEmployee.task.edit',['task'=>$task,'users'=>$users]);
    }

    public function update(int $idT,StorePostRequestAddTask $request)
    {
        $params=$this->helperMethod($request);
        $this->tasksRepository->update($idT,$params);
        return redirect(route('AdminOrSuperEmployee.task.index'));
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
            'whoAdd'=>Auth::id(),
        ];
    }
}
