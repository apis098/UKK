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
        return $this->belongTo(Task::class,'task_id');
    }
}
