@extends('layouts.teacher_layout')
@php
use App\Models\User;
use App\Models\Group;
@endphp
@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i>@if(isset($group_id)) {{Group::findGroup($group_id)}} @else All my @endif students</h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <div class="table-responsive mt-2 w-100">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Brithday</th>
                        <th>Group</th>
                        <th>Avatar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student as $key => $value)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{User::findUser($value->user_id)}}</td>
                            <td>{{User::findUsername($value->user_id)}}</td>
                            <td>{{User::findUserbday($value->user_id)}}</td>
                            <td>{{Group::findGroup($value->group_id)}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{--{{ $news->links() }}--}}
