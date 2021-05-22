<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_title extends Model
{
    use HasFactory;

    protected $fillable = ['title_uz','title_ru', 'user_id', 'subject_id'];

    public function subject()
    {
        return $this->hasOne(
            Subject::class,
            'id',
            'subject_id'
        );
    }
}
