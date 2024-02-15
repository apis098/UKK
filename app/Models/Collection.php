<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $tables = "collections";
    protected $guarded = "id";
    protected $primaryKey = "id";
    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function atachments(){
        return $this->hasMany(atachment::class,'collection_id');
    }
}
