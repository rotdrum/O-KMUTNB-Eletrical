<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Researchnews extends Model
{
    protected $table = "researchnews";

    protected $fillable = ['title', 'comment', 'pic', 'file', 'filecomment', 'url'];
   
}
