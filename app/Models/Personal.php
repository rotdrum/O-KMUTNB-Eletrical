<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = "personal";

    protected $fillable = ['pic_name', 'name_thai', 'name_eng', 'position', 'initial', 'email', 'contact', 'tel', 'bachelor', 'master', 'phd', 'edu1', 'edu2', 'edu3', 'edu4', 'edu5', 'file_name', 'username', 'password', 'status'];
   
}
