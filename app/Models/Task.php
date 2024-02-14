<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $tables = 'tasks';
    protected $primaryKey = 'id';
    protected $guarded = 'id';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function atachments(){
        return $this->hasMany(atachment::class,'task_id');
    }
}
