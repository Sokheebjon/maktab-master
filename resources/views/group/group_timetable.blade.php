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
                                  action="{{ route('admin.group.timetable_store') }}">
                                @csrf
                                <div class="row cloned">
                                    <div class="clone_div col-lg-9">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleFormControlSelect1">Group Subject</label>
                                                <select class="form-control form-control-lg" name="group_subject_id[]"
                                                        id="exampleFormControlSelect1">
                                                    @foreach($group_subject as $groups)
                                                        <option value="{{$groups->id}}">{{ $groups->id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4 last_element">
                                                <label for="exampleFormControlSelect1">Day</label>
                                                <select class="form-control form-control-lg" name="week_day[]"
                                                        id="exampleFormControlSelect1">

                                                    @for($i = 1; $i < count($days); $i ++)
                                                        <option
                                                            value="{{$days[$i]}}">{{ $days[$i] }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputNameuz">lesson time</label>
                                                <input type="time"
                                                       class="form-control @error('time') is-invalid @enderror"
                                                       id="exampleInputNameuz" required name="lesson_time[]"/>
                                                @error('time')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <a class="btn btn-danger removed_btn"
                                                   style="width: 101px; margin-top: 22px" onclick="removed(this)">Removed
                                                </a>
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
                                            <th>Day</th>
                                            <th>Lesson time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($timetable as $key => $value)
                                            <tr>
                                                <td>{{ ++$key}}</td>
                                                <td>
                                                    <a href="{{route('admin.update_profile', $value->id)}}">{{$value->group_subject_id}}</a>
                                                </td>
                                                <td>{{$value->week_day}}</td>
                                                <td>{{$value->lesson_time}}</td>
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

