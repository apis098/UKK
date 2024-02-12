<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $tables = 'classes';
    protected $primaryKey = 'id';
    protected $guarded = 'id';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function member()
    {
        return $this->belongsToMany(User::class, 'pivotclass', 'class_id', 'user_id');
    }
    public function memberCount(){
        $memberCount = PivotClass::where('class_id',$this->id)->count();
        return $memberCount;
    }
    public function materials(){
        return $this->hasMany(materials::class,'class_id');
    }
    public function tasks(){
        return $this->hasMany(Task::class,'class_id');
    }
}
