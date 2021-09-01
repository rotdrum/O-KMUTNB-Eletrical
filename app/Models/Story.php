<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = "story";

    protected $fillable = ['year', 'title', 'comment'];

   
}
