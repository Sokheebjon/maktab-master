@extends('layouts.admin_layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add new category</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> create </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{route('admin.category.update', $category->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputNameuz">Category_uz</label>
                                    <input type="text" class="form-control" id="exampleInputNameuz" name="name_uz" value="{{$category->name_uz}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameru">Category_ru</label>
                                    <input type="text" class="form-control" id="exampleInputNameru" name="name_ru"  value="{{$category->name_ru}}"/>
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

