<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engineermaster extends Model
{
    protected $table = "engineermaster";

    protected $fillable = ['title', 'comment', 'title_file', 'url', 'name_file'];

   
}
