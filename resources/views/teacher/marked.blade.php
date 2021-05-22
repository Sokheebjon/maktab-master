@extends('layouts.teacher_layout')
@php
    use App\Models\User;
@endphp
@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i> Classes
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
        </div>
        <div class="table-responsive mt-2 w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 350px;">Fullname</th>
                    <th style="width: 350px;">Username</th>
                    <th style="text-align: center; padding-left: 0">mark</th>
                    <th style="text-align: center; padding-left: 0">Is_come</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{route('teacher.marked_store_update', $group)}}" method="POST">
                    @csrf
                    @foreach($raiting as $key => $value)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <input type="hidden" class="form-control" value="{{$value->group_sub_id}}" name="group_id[]"/>
                            <td>
                                <div class="form-group" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                                    <input type="hidden" class="form-control" style="border: none; background: white"
                                           readonly
                                           value="{{$value->user_id}}" name="user_id[]"/>
                                </div>
                                {{User::findUser($value->user_id)}}
                            </td>
                            <td>
                                {{User::findUsername($value->user_id)}}
                            </td>

                            <td style="width: 30px; padding: 10px 0 0 10px !important;">
                                <div class="form-group" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                                    <input type="text" class="form-control" size="1" max="5" maxlength="1"
                                           value="{{$value->mark}}" name="mark[]"/>
                                </div>
                            </td>
                            <td style="width: 30px; padding: 10px 0 0 10px !important;">
                                <div class="form-group" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                                    <input type="hidden" name="is_come[]" value="{{$value->is_come}}">
                                    <input type="checkbox" class="form-control" style="transform: scale(1.5)"
                                           @if($value->is_come == 1) checked @endif onchange="change(this)"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Saqlash</button>
                    </div>
                </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection
