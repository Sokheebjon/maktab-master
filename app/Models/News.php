<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['title_uz', 'title_ru', 'about_uz', 'about_ru', 'slug', 'image', 'status', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_uz')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function get_enum_values($table, $field)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM news WHERE Field = 'status'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            if($v == 0){
                $enum[0] = 'inactive';
            }
            if($v == 1){
                $enum[1] = 'active';
            }
        }
        return $enum;
    }

}
