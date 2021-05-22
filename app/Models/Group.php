<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 */
class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'teacher_id'];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'group_users',
            'group_id',
            'user_id');
    }

    public static function findGroup($id){
        return Group::where('id', $id)->first()->name;
    }
}
