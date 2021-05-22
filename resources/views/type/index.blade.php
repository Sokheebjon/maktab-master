@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-view-list"></i> Type
            <a href="{{ route('admin.type.create') }}" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus">Add New</i></a>
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
                        <th>Type</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($type as $val=>$cat)

                        <tr>
                            <td>{{++$val}}</td>
                            <td>{{$cat->type}}</td>
                            <td>
                                <a href="{{route('admin.type.show', $cat->id)}}" class="btn btn-success btn-icon-text">
                                    <i class="mdi mdi-eye">Show</i>
                                </a>
                                <a href="{{ route('admin.type.edit', $cat->id) }}" class="btn btn-primary">
                                    <i class="mdi mdi-eye">Edit</i>
                                </a>
                                <form action="{{ route('admin.type.destroy', $cat->id) }}" method="POST">
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
        <br>
        {{--        {{$categories->links()}}--}}
    </div>
@endsection
