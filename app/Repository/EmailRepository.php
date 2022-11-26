<?php

declare(strict_types=1);

namespace App\Repository;
use App\Models\EmailUsers;

class EmailRepository
{
        private EmailUsers $emailUsers;
        public function __construct(EmailUsers $emailUsers)
        {
            $this->emailUsers=$emailUsers;
        }

    public function get(string $email)
    {
        return $this->emailUsers
            ->where('email',$email)
            ->first();
    }

    public function findEmaill(int $id){
            return $this->emailUsers
                ->find($id)
                ->first();
    }

    public function update(int $id,array $params)
    {
       return $this->emailUsers
            ->find($id)
            ->update($params);
    }
}
