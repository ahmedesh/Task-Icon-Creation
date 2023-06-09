<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;


    protected $guarded = [];

//    students
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
}
