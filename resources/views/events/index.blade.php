@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-eventbrite menu-icon"></i> Events
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
                        <th>Begin date</th>
                        <th>Status</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event => $n)
                        <tr>
                            <td>{{ ++$event}}</td>
                            <td>{{$n->title_uz}}</td>
                            <td>{{$n->title_ru}}</td>
                            <td>{{$n->begin_date}}</td>
                            <td>{{$n->status}}</td>
                            <td>
                                <a href="{{route('admin.events.show', $n)}}" class="btn btn-success btn-icon-text">
                                    <i class="mdi mdi-eye">Show</i>
                                </a>
                                <a href="{{ route('admin.events.edit', $n) }}" class="btn btn-primary">
                                    <i class="mdi mdi-eye">Edit</i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $n) }}" method="POST">
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
        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
            {{$events->links()}}
        </nav>
    </div>
@endsection
