<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    protected $table = "engineer";

    protected $fillable = ['title', 'comment', 'title_file', 'url', 'name_file'];

   
}
