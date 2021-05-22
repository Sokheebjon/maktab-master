@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i> Classes
            <a href="{{ route('admin.group.create') }}" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus">Add New</i></a>
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
                        <th>Name</th>
                        <th>Actions</th>
                        <th>Add students</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group as $key => $value)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td><a href="{{route('admin.group.edit', $value->id)}}">{{$value->name}}</a></td>
                            <td>
                                <a href="{{route('admin.group.group_user', $value->id)}}" class="btn btn-info">Add users</a>
                                <a href="{{route('admin.group.group_subject', $value->id)}}" class="btn btn-secondary">Add Subject</a>
                                <a href="{{route('admin.group.group_timetable', $value->id)}}" class="btn btn-warning">Timetable</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.group.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
