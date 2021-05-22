@extends('layouts.admin_layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add new user with bulk insert</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <form action="{{route('admin.group.bulk_insert', $group)}}" method="GET">
                            @csrf
                        <div class="card-body">
                            <h5 class="card-title " style="font-size: 20px">users table
                            </h5>
                            <div class="d-flex justify-content-center">
                                <div class="table-responsive mt-2 w-100">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="padding-right: 20px">Bulk</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($not_in as $key => $value)
                                            <tr>
                                                <td>{{ ++$key}}</td>
                                                <td style="width: 30px; padding: 10px 0 0 10px !important;">
                                                    <div class="form-group" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                                                        <input type="hidden"  name="is_check[]" value="">
                                                        <input type="checkbox" class="form-control" onchange="change(this)" style="transform: scale(1.5)"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" style="margin-right: 10px; margin-bottom: 0.5rem!important;">
                                                        <input type="hidden" class="form-control" style="border: none; background: white"
                                                               readonly
                                                               value="{{$value->id}}" name="user_id[]"/>
                                                    </div>
                                                    {{$value->name}}
                                                </td>
                                                <td>{{$value->username}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="form-group col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary"> Saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                                  action="{{ route('admin.group.group_user_store', $group->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="exampleInputNameuz">Name</label>
                                        <textarea class="form-control @error('about') is-invalid @enderror"
                                                  id="exampleInputNameuz" name="about" cols="10" rows="20"
                                                  placeholder="name || surname || brithday(year-month-day)"></textarea>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                                    <div class="form-group col-lg-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary"> Saqlash</button>
                                    </div>
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
                            <h5 class="card-title mt-5 pt-4" style="font-size: 20px">{{$group->name}} users table
                            </h5>
                            <div class="d-flex justify-content-center">
                                <div class="table-responsive mt-2 w-100">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th>Birthday</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $value)
                                            <tr>
                                                <td>{{ ++$key}}</td>
                                                <td>
                                                    <a href="{{route('admin.update_profile', $value->id)}}">{{$value->name}}</a>
                                                </td>
                                                <td>{{$value->username}}</td>
                                                <td>{{$value->birth_date}}</td>
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
