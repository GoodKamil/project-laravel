<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Users;

class UserRepository
{
    private Users $userModel;
    public function __construct(Users  $userModel)
    {
        $this->userModel = $userModel;
    }

    public function all()
    {
      return $this->userModel
          ->with('positions')
          ->orderBy('created_at','desc')
          ->get();
    }

    public function get(int $id)
    {
        return $this->userModel
            ->with('positions')
            ->find($id);
    }

    public function update(int $id,array $params)
    {
        $this->userModel
            ->find($id)
            ->update($params);
    }
}
