<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operationupload extends Model
{
    protected $table = "operationupload";

    protected $fillable = ['name_type', 'name_file', 'user_id'];

}
