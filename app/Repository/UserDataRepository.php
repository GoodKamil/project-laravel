<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\UserData;

class UserDataRepository
{
    private UserData $userDataModel;

    public function __construct(UserData $userDataModel)
    {
        $this->userDataModel = $userDataModel;
    }

    public function get(int $id)
    {
        return $this->userDataModel
            ->where('id_U',$id)
            ->first();
    }

    public function save(array $params)
    {
        $this->userDataModel
            ->fill($params)
            ->save();
    }

    public function update(int $id,array $params)
    {
        $this->userDataModel
            ->where('id_U',$id)
            ->update($params);
    }
}
