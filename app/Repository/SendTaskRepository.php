<?php

declare(strict_types=1);

namespace App\Repository;
use App\Models\EmailUsers;
use App\Models\SendTask;

class SendTaskRepository
{
    private SendTask $sendTask;

    public function __construct(SendTask $sendTask)
    {
        $this->sendTask = $sendTask;
    }

    public function save(array $params)
    {
       $this->sendTask
            ->fill($params)
            ->save();

    }

    public function getId()
    {
        return $this->sendTask->id;
    }

    public function get(array $params)
    {
        return $this->sendTask
               ->where($params)
               ->first();
    }

    public function search(int $id)
    {

    }

}
