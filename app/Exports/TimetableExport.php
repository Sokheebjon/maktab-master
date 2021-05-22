<?php

namespace App\Exports;

use App\Models\Timetable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TimetableExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection()
    {
        $timetable = DB::table('timetables')
            ->select('timetables.week_day', 'timetables.lesson_time','groups.name as groupName')
            ->join('group_subjects', 'group_subjects.id', '=', 'timetables.group_subject_id')
            ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            ->where(['group_subjects.user_id' => Auth::id(), 'timetables.week_day' => DB::raw('WEEKDAY(CURDATE())')])
            ->get();

        for ($i = 0; $i < count($timetable); $i ++){
            foreach ($timetable[$i] as $time){
                $timetable[$i]->week_day = Timetable::getDayName($timetable[$i]->week_day);
            }
        }
        return $timetable;
    }
}
