<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer group_subject_id
 * @property mixed lesson_time
 * @property integer week_day
 */
class Timetable extends Model
{
    use HasFactory;
    protected $fillable = ['group_subject_id', 'week_day', 'lesson_time'];

    public static function week_day()
    {
        return [
            0 => 'monday',
            1 => 'tuesday',
            2 => 'wednesday',
            3 => 'thursday',
            4 => 'friday',
            5 => 'saturday',
            6 => 'sunday'
        ];
    }

    public static function getDayName($dayOfWeek): string
    {
        switch ($dayOfWeek){
            case 6:
                return 'Sunday';
            case 0:
                return 'monday';
            case 1:
                return 'tuesday';
            case 2:
                return 'wednesday';
            case 3:
                return 'thursday';
            case 4:
                return 'friday';
            case 5:
                return 'saturday';
            default:
                return 'Xato';
        }
    }
}
