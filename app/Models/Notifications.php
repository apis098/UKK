<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $tables = 'notifications';
    protected $primaryKey = 'id';
    protected $guarded = 'id';

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function recipient(){
        return $this->belongsTo(User::class,'recipient_id');
    }
    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function material(){
        return $this->belongsTo(materials::class,'material_id');
    }
    public function collection(){
        return $this->belongsTo(Collection::class,'collection_id');
    }
    public function atachment(){
        return $this->belongsTo(atachment::class,'atachment_id');
    }
}
