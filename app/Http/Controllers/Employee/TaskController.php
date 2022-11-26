<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StorePostRequestHandOverTheTask;
use App\Repository\SendTaskRepository;
use App\Repository\TasksRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{

    private UserRepository $userRepository;
    private TasksRepository $tasksRepository;

    public function __construct(UserRepository $userRepository, TasksRepository $tasksRepository)
    {
        $this->userRepository = $userRepository;
        $this->tasksRepository = $tasksRepository;
    }

    public function index()
    {
        return view('employee.task.index',[
            'tasks'=>$this->tasksRepository->getTaskUser(auth::id())
        ]);
    }

    public function show(int $id)
    {
        return view('employee.task.show',[
            'task'=>$this->tasksRepository->get($id),
        ]);
    }

    public function handOverTheTask(SendTaskRepository $sendTaskRepository,StorePostRequestHandOverTheTask $request)
    {
       $request->validated();
       $params=[
           'task_id'=>$request->input('idT'),
           'comment'=>$request->input('comment'),
           'fileName'=>$request->file('formFile')?->store('tasks/'.$request->input('idT'),'public')
       ];
      $sendTaskRepository->save($params);
      $this->tasksRepository->update($request->input('idT'),['send_id'=>$sendTaskRepository->getId(),'Done'=>1]);
      return redirect(route('employee.task.index'));
    }



}
