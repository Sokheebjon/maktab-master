@extends('layouts.admin_layout')
@php
    use App\Models\News;
@endphp
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add new category</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> create </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_uz</label>
                                    <input type="text" class="form-control" id="exampleInputNameuz" value="{{$news->title_uz}}" name="title_uz" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_ru</label>
                                    <input type="text" class="form-control" id="exampleInputNameru" value="{{$news->title_ru}}" name="title_ru"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_uz</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control" name="about_uz">{{$news->about_uz}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_ru</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control" name="about_ru" >{{$news->about_ru}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    <select class="form-control form-control-lg" name="status" id="exampleFormControlSelect1">
                                        @foreach(News::get_enum_values('news', 'status') as $key=>$new)
                                            <option value="{{ $key}}" @if($news->status == $key) selected @endif>{{ $new }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control form-control-lg" name="category_id" id="exampleFormControlSelect1">
                                        <option>Choose Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" @if($news->category_id == $cat->id) selected @endif>{{ $cat->name_uz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Image</label>
                                    <input type="file" class="form-control" id="exampleInputNameru" placeholder="" name="image"/>
                                </div>
                            @if($news->image)
                                <div class="form-group">
                                    <img src="{{URL::to($news->image)}}" alt="sasa" style="width: 90px; height: 90px">
                                </div>
                                @endif
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary"> Saqlash </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
        </footer>
    </div>
@endsection
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

