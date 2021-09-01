<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activity";

    protected $fillable = ['title', 'comment', 'pic', 'file', 'filecomment', 'url', 'status'];
   
}
