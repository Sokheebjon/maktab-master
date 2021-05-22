@extends('layouts.admin_layout')
@php
    use App\Models\News;
@endphp
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add new subject group</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.group.index') }}">{{$group->name}}
                                group</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create subject group</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form class="forms-sample" method="POST"
                                  action="{{ route('admin.group.group_subject_store') }}">
                                @csrf
                                <div class="row cloned">
                                    <div class="clone_div col-lg-9">
                                        <div class="row">
                                            <div class="form-group col-lg-5">
                                                <label for="exampleFormControlSelect1">Subject</label>
                                                <select class="form-control form-control-lg" name="subject_id[]"
                                                        id="exampleFormControlSelect1">
                                                    @foreach($subject as $sub)
                                                        <option value="{{$sub->id}}">{{ $sub->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-5 last_element">
                                                <label for="exampleFormControlSelect1">Teacher</label>
                                                <select class="form-control form-control-lg" name="teacher_id[]"
                                                        id="exampleFormControlSelect1">
                                                    @foreach($teacher as $teach)
                                                        <option value="{{$teach->id}}">{{ $teach->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <a class="btn btn-danger removed_btn"
                                                    style="width: 101px; margin-top: 22px" onclick="removed(this)">Removed
                                                </a>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="hidden"
                                                       class="form-control @error('group_id') is-invalid @enderror"
                                                       id="exampleInputNameuz" value="{{$group->id}}" name="group_id"/>
                                                @error('group_id')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-success cloning"
                                                style="width: 100px; margin-top: 22px">Add new
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 d-flex justify-content-end button_btn">
                                    <button type="submit" class="btn btn-primary"> Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mt-5 pt-4" style="font-size: 20px">{{$group->name}} Subject teacher
                            </h5>
                            <div class="d-flex justify-content-center">
                                <div class="table-responsive mt-2 w-100">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($group_subject as $key => $value)
                                            <tr>
                                                <td>{{ ++$key}}</td>
                                                <td>
                                                    <a href="{{route('admin.update_profile', $value->id)}}">{{$value->subject->name}}</a>
                                                </td>
                                                <td>{{$value->teacher->name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                        href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
        </footer>
    </div>
@endsection
