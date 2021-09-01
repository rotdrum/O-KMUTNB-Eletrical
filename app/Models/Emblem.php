<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emblem extends Model
{
    protected $table = "emblem";

    protected $fillable = ['pic', 'title', 'comment'];

   
}
