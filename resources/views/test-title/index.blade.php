@extends('layouts.teacher_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-book-open-page-variant"></i> Test
            <a href="{{ route('teacher.test-title.create') }}" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus"></i>{{__('news.add')}}</a>
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
                        <th>Title_uz</th>
                        <th>Subject</th>
                        <th>Qestion Count</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($test_title as $new => $n)
                        <tr>
                            <td>{{ ++$new}}</td>
                            <td>{{$n->title_uz}}</td>
                            <td>{{ $n->subject->name }}</td>
                            <td>{{\App\Models\Question::getQuestionCount($n->id)}}</td>
                            <td>
                                <a href="{{route('teacher.test-title.edit', $n)}}" class="btn btn-success btn-icon-text">
                                    <i class="mdi mdi-eye">Show and edit</i>
                                </a>
                                <form action="{{ route('teacher.test-title.destroy', $n) }}" method="POST">
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
