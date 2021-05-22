<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz', 'name_ru'
    ];

    public function news(){
        return $this->hasMany('App\Models\News');
    }

    public static function getCategoryCount(){
        return self::withCount('news')->get();
    }
}
