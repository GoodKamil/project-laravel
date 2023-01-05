<?php

declare(strict_types=1);

namespace App\Repository;



use App\Models\Tasks;

class TasksRepository
{
    private Tasks $tasksModel;
    public function __construct(Tasks  $tasksModel)
    {
        $this->tasksModel = $tasksModel;
    }

    public function all()
    {
        return $this->tasksModel
            ->with(['users','send_task'])
            ->orderBy('created_at','desc')
            ->get();
    }

    public function userTasks(int $idUsera)
    {
        return $this->tasksModel
            ->with('send_task')
            ->where('whoAdd',$idUsera)
            ->where('id_U','!=',$idUsera)
            ->orderBy('created_at','desc')
            ->get();
    }

    public function getTaskUser(int $idU)
    {
        return $this->tasksModel
            ->where('id_U',$idU)
            ->orderBy('created_at','desc')
            ->get();
    }

    public function get(int $id)
    {
        return $this->tasksModel
            ->with('users')
            ->with('usersAdd')
            ->find($id);
    }

    public function insert(array $params)
    {
       return $this->tasksModel
            ->fill($params)
            ->save();
    }
    public function update(int $id,array $params)
    {
      return  $this->tasksModel
            ->find($id)
            ->update($params);
    }

}
