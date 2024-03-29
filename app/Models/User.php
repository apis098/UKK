<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'pivotclass', 'user_id', 'class_id');
    }
    public function myClass()
    {
        return $this->hasMany(Classes::class, 'user_id');
    }
    public function tasksNotSubmitted()
    {
        return Task::whereDoesntHave('collections', function ($query) {
            $query->where('user_id', $this->id);
        })->get();
    }
    public function collections()
    {
        return $this->hasMany(Collection::class, 'user_id');
    }
}
