<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'id_P','created_at'
    ];
    protected $primaryKey = 'id_E';

    public function users()
    {
//        return $this->hasMany(Users::class,'position','id_P');
    }
}
