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
            ->with('users')
            ->orderBy('created_at','desc')
            ->get();
    }

    public function allEmployee(int $idUsera)
    {
        return $this->tasksModel
            ->where('whoAdd',$idUsera)
            ->orderBy('created_at','desc')
            ->get();
    }

    public function get(int $id)
    {
        return $this->tasksModel
            ->with('users')
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
        $this->tasksModel
            ->find($id)
            ->update($params);
    }

}
