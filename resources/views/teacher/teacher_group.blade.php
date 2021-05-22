@extends('layouts.teacher_layout')
@php
    use App\Models\Group;
@endphp
@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i>My Classes
        </h4>
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
                        <th>Group name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group as $key => $value)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{Group::findGroup($value->group_id)}}</td>
                            <td>
                                <a href="{{route('teacher.all_student', $value->group_id)}}" class="btn btn-info">Show users</a>
                                <a href="{{route('teacher.marked', $value->group_id)}}" class="btn btn-warning">mark and user visit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{--{{ $news->links() }}--}}
