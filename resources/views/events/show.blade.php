@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i> Events
            <a href="{{ route('admin.events.create') }}" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus">Add New</i></a>
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
                        <th>Title uz</th>
                        <th>Title ru</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$events->id}}</td>
                        <td>{{$events->title_uz}}</td>
                        <td>{{$events->title_ru}}</td>
                        <td><img src="{{URL::to($events->image)}}" alt="rasm" style="height: 90px; width: 90px; border-radius: 0"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{--{{ $news->links() }}--}}

