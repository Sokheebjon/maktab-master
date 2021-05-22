<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'username',
        'role',
        'birth_date',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function group()
    {
        return $this->belongsToMany(
            Group::class,
            'group_users',
            'user_id',
            'group_id');
    }

    function raiting(){
        return $this->hasMany("App\Raiting" , "user_id");
    }

    public static function findUser($id){
        return User::where('id', $id)->first()->name;
    }
    public static function findUsername($id){
        return User::where('id', $id)->first()->username;
    }
    public static function findUserbday($id){
        return User::where('id', $id)->first()->birth_date;
    }
}
