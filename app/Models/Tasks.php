<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tasks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_T';
    protected $table='user_tasks';
    protected $fillable = [
        'id_U', 'Title', 'Description', 'DateFrom','DateTo','priority','whoAdd','send_id','Done'
    ];

    public function users():hasMany
    {
        return $this->hasMany(Users::class,'id_U','id_U');
    }
    public function usersAdd():hasMany
    {
        return $this->hasMany(Users::class,'id_U','whoAdd');
    }
    public function send_task():hasOne
    {
        return $this->hasOne(SendTask::class,'id','send_id');
    }

    public function isSend()
    {
        return !is_null($this->send_task);
    }
    public function isDone()
    {
        return (int)$this->Done===1;
    }
}
