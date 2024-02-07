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
        return $this->hasMany(User::class,);
    }
    public function classes(){
        return $this->hasMany(Classes::class,);
    }

}
