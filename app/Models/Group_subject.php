<?php

namespace App\Models;

use App\Http\Middleware\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed subject_id
 * @property mixed user_id
 * @property mixed group_id
 */
class Group_subject extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'subject_id', 'user_id'];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'groups',
            'group_id',
            'user_id'
        );
    }

    public function subject()
    {
        return $this->hasOne(
            Subject::class,
            'id',
            'subject_id'
        );
    }

    public function teacher()
    {
        return $this->hasOne(
            User::class,
            'id',
            'user_id'
        );
    }
}
