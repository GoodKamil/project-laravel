<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email_user', 'position','created_at','password'
    ];
    protected $primaryKey = 'id_U';

    public function positions()
    {
        return $this->belongsTo(Positions::class,'position','id_P');
    }

    public function tasks()
    {
        return $this->belongsTo(Tasks::class,'id_U','id_U');
    }

    public function email_users()
    {
        return $this->belongsTo(EmailUsers::class,'email_user','id_E');
    }
}
