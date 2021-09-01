<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "new";

    protected $fillable = ['title', 'comment', 'pic', 'file', 'filecomment', 'url', 'status'];
   
}
