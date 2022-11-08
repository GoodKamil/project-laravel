<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_T';
    protected $table='user_tasks';
    protected $fillable = [
        'id_U', 'Title', 'Description', 'DateFrom','DateTo','priority','whoAdd'
    ];

    public function users()
    {
        return $this->hasMany(Users::class,'id_U','id_U');
    }
}
