<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends  Model
{
       protected $fillable=['id_U','address','zip_code','city','country','province'];
       protected $primaryKey='id_D';

    public function users()
    {
        return $this->hasOne(Users::class);
    }
}
