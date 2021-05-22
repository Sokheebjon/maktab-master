@extends('layouts.admin_layout')
@php
    use App\Models\Events;
@endphp
@section('content')
    <style>
        input {
            border: none;
            box-sizing: border-box;
            outline: 0;
            padding: .75rem;
            position: relative;
            width: 100%;
        }
        input[type="datetime-local"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Edit <a href="javascript:void(0)">{{$events->title_uz}}</a></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                        <li class="breadcrumb-item" aria-current="page"> <a href="javascript:void(0)">{{$events->title_uz}}</a> </li>
                        <li class="breadcrumb-item active" aria-current="page"> edit </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('admin.events.update', $events) }}" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_uz</label>
                                    <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="exampleInputNameuz" value="{{$events->title_uz}}" name="title_uz" />
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_ru</label>
                                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="exampleInputNameru" value="{{$events->title_ru}}" name="title_ru"/>
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_uz</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control @error('Description_uz') is-invalid @enderror" name="about_uz">{{$events->about_uz}}</textarea>
                                    @error('Description_uz')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_ru</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control @error('Description_ru') is-invalid @enderror" name="about_ru" >{{$events->about_ru}}</textarea>
                                    @error('Description_ru')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dates">Begin date</label>
                                    <input type="datetime-local" class="form-control @error('begin_date') is-invalid @enderror" id="dates" value="{{$events->getDateAttribute($events->begin_date)}}" name="begin_date" />
                                    @error('begin_date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Image</label>
                                    <input type="file" class="form-control" id="exampleInputNameru" placeholder="" name="image"/>
                                </div>
                                @if($events->image)
                                    <div class="form-group">
                                        <img src="{{URL::to($events->image)}}" alt="sasa" style="width: 90px; height: 90px">
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

