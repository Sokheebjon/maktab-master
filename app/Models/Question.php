<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['test_title_id', 'type_id', 'question'];

    public static function scopegetQuestionCount($query, $id)
    {
        return $query->where('test_title_id', $id)->get()->count();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function type()
    {
        return $this->hasOne(
            Type::class,
            'id',
            'type_id'
        );
    }
}
