<?php

namespace App\Http\Controllers\AdminOrSuperEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequestAddTask;
use App\Repository\SendTaskRepository;
use App\Repository\TasksRepository;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

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
        return redirect(route('AdminOrSuperEmployee.task.index'))->with('success','Pomyślnie dodano zadanie');
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
        return redirect(route('AdminOrSuperEmployee.task.index'))->with('success','Pomyślnie zaktualizowano zadanie');
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

    public function delete(int $id,SendTaskRepository $sendRepository):JsonResponse
    {
        try {
            $task=$this->tasksRepository->get($id);
            if($task->send_id)
            {
                $this->deleteSendTask($task->send_id, $sendRepository);
            }
            else {
                $task->delete();
            }
            return response()->json([
                'status'=>'success',
                'message'=>'Prawidłowo usunięto zadanie'
            ]);
        }catch(Throwable $e)
        {
            return response()->json([
                'status'=>'error',
                'message'=>'Wystąpił problem przy usuwaniu zadania'
            ]);
        }
    }

    public function deleteSendTask(int $id,SendTaskRepository $sendRepository)
    {
         $sendTask=$sendRepository->get(['id'=>$id]);
         if (($sendTask->fileName !== '') && Storage::disk('public')->exists($sendTask->fileName)) {
             Storage::disk('public')->delete($sendTask->fileName);
             Storage::disk('public')->deleteDirectory('tasks/'.$sendTask->task_id);
         }
        $sendTask->delete();
    }
}
