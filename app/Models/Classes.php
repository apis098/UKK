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
}
