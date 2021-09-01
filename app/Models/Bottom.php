<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bottom extends Model
{
    protected $table = "bottom";

    protected $fillable = ['office', 'layer', 'department', 'faculty', 'tel', 'email'];

   
}
