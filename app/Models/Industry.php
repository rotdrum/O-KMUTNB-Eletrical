<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = "industry";

    protected $fillable = ['title', 'comment', 'title_file', 'url', 'name_file'];

   
}
