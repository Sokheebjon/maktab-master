@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-newspaper"></i> {{__('news.news')}}
            <a href="{{ route('admin.news.create') }}" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus"></i>{{__('news.add')}}</a>
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
                        <th>Title   uz</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new => $n)
                        <tr>
                            <td>{{ ++$new}}</td>
                            <td>{{$n->title_uz}}</td>
                            <td>{{$n->category->name_uz}}</td>
                            <td><img src="{{URL::to($n->image)}}" alt="rasm" style="height: 90px; width: 90px; border-radius: 0"></td>
                            <td>
                                <a href="{{route('admin.news.show', $n)}}" class="btn btn-success btn-icon-text">
                                    <i class="mdi mdi-eye">Show</i>
                                </a>
                                <a href="{{ route('admin.news.edit', $n) }}" class="btn btn-primary">
                                    <i class="mdi mdi-eye">Edit</i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $n) }}" method="POST">
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
