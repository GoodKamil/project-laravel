<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SendTask extends Model
{
    use HasFactory;
    protected $table='send_task';
    protected $fillable = [
        'task_id', 'comment', 'fileName'
    ];

    public function task():hasOne
    {
        return $this->hasOne(Tasks::class,'id_T','task_id');
    }

    public function isTask():bool
    {
        return !is_null($this->task);
    }
}
