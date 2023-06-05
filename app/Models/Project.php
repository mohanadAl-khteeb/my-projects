<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'description' , 'user_id', 'status'];

    public function user(){
        return $this->belongsTo(Uesr::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
