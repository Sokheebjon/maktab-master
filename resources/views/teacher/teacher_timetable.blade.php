@extends('layouts.teacher_layout')
@php
    use App\Models\Group;
    use App\Models\Timetable;
@endphp
@section('content')
    <style>
        input {
            border: none;
            box-sizing: border-box;
            outline: 0;
            padding: .75rem;
            position: relative;
            width: 100%;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
    </style>
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i>Today my timetable
        </h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <div class="row w-100 d-flex justify-content-center">
                <div class="form-group col-lg-6" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                    <input type="date" class="form-control" name="search_date"/>
                </div>
                <div class="form-group col-lg-2">
                    <button class="btn btn-primary" id="filter_btn" style="padding: 6px 20px;">Search</button>
                </div>
                <div class="col-lg-12 d-flex justify-content-end" style="transform: translateY(-110px)">
                    <a href="{{route('teacher.teacher_timetable_excel')}}" class="btn btn-success" style="padding: 6px 20px;">Export to excel</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{route('teacher.teacher_timetable_pdf')}}" class="btn btn-primary" style="padding: 6px 20px;">Export to pdf</a>
                </div>

            </div>
        <section>
        <div class="d-flex justify-content-center">
            <div class="table-responsive mt-2 w-100">
                <table class="table table-bordered" id="table_id">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Group name</th>
                        <th>Week day</th>
                        <th>Lesson time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($today_timetable as $key => $value)
                        <tr id="tr">
                            <td>{{ ++$key}}</td>
                            <td>{{$value->groupName}}</td>
                            <td>{{Timetable::getDayName($value->week_day)}}</td>
                            <td>{{$value->lesson_time}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </section>
    </div>
@endsection
