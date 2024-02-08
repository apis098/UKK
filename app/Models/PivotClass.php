<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotClass extends Model
{
    use HasFactory;
    protected $table = 'pivotclass';
    protected $guarded = 'id';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }

}
