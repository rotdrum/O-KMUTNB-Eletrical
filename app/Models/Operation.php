<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = "operation";

    protected $fillable = ['url', 'student_id', 'student_name', 'sub', 'tel', 'email', 'address', 'type_address', 'date_start', 'date_end', 'name_to', 'name_subport', 'tel_subport', 'user_id'];
   
}
