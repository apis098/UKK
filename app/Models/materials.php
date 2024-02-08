<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materials extends Model
{
    use HasFactory;
    protected $tables = "materials";
    protected $guarded = "id";
    protected $primaryKey = "id";

}
