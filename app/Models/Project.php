<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";

    protected $fillable = ['name', 'user_id'];

    public function user(){
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function tasks(){
        return $this->hasMany("App\Models\Task", "project_id", "id");
    }
}
