<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;

class Users extends Authenticatable
{

    use HasFactory,Notifiable;


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
        return $this->hasOne(EmailUsers::class,'id_E','email_user');
    }
    public function users_data()
    {
        return $this->hasOne(UserData::class,'id_U','id_U');
    }

    public function isAdmin()
    {
        return $this->positions()->where('role',3)->exists();
    }

    public function isDataUser() : bool
    {
        return !is_null($this->users_data);
    }

}
