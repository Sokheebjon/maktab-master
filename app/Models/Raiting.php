<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_subject_id', 'group_id', 'mark', 'is_come', 'lesson_datetime'];

    public function users(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function group(){
        return $this->belongsTo(Group::class, "group_id");
    }
}
