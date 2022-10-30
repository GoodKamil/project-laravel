<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_P';

    public function users()
    {
        return $this->hasMany(Users::class,'position','id_P');
    }
}
