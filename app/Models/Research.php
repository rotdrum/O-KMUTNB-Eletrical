<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = "research";

    protected $fillable = ['research_id', 'research_type', 'format', 'thai_name', 'eng_name', 'year', 'term', 'class', 'teacherid_one', 'teacherid_two', 'teacherid_three', 'teachername_two', 'teachername_three', 'student_one', 'student_two', 'student_three', 'file_type', 'file_name', 'status', 'research_look'];
   
}
