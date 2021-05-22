@extends('layouts.admin_layout')
@php
    use App\Models\News;
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
                <h3 class="page-title">Add new events</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> create </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_uz</label>
                                    <input type="text" class="form-control" id="exampleInputNameuz"  name="title_uz" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Title_ru</label>
                                    <input type="text" class="form-control" id="exampleInputNameru"  name="title_ru"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_uz</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control" name="about_uz"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4MD" class="text-bold"><strong>Description_ru</strong></label>
                                    <br>
                                    <textarea class="ckeditor form-control" name="about_ru" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Begin date</label>
                                    <input type="datetime-local" class="form-control form-control-lg" name="begin_date" id="exampleFormControlSelect1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Image</label>
                                    <input type="file" class="form-control" id="exampleInputNameru"  name="image"/>
                                </div>
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

