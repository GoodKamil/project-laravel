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

    public function all(int $idUsera)
    {
      return $this->userModel
          ->with('positions')
          ->with('email_users')
          ->where('id_U','!=' ,$idUsera)
          ->orderBy('created_at','desc')
          ->get();
    }

    public function allEmployee()
    {
        return $this->userModel
                 ->whereHas('positions',function($query) {
                     $query->where('role', 1);
                 })
                 ->with('email_users')
                 ->orderBy('created_at','desc')
                 ->get();
    }


    public function get(int $id)
    {
        return $this->userModel
            ->with('positions')
            ->with('email_users')
            ->find($id);
    }

    public function update(int $id,array $params)
    {
        $this->userModel
            ->find($id)
            ->update($params);
    }

    public function insert(array $params)
    {
        $this->userModel
            ->fill($params)
            ->save();
    }
}
