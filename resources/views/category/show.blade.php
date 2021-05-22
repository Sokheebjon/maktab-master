@extends('layouts.admin_layout')

@section('content')
    <div class="card-body">
        <h4 class="card-title mt-5 pt-4" style="font-size: 30px"><i class="mdi mdi-apps"></i> Category
            <a href="#" class="btn btn-success ml-3" style="background-color: #2ecc71"><i class="mdi mdi-plus">Add New</i></a>
        </h4>
        <div class="d-flex justify-content-center">
            <div class="table-responsive mt-2 w-100">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name uz</th>
                        <th>Name ru</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name_uz}}</td>
                            <td>{{$category->name_ru}}</td>
                            <td>
                                <a href="#" class="btn btn-primary">
                                    <i class="mdi mdi-eye">Edit</i>
                                </a>
                                <a href="#" class="btn btn-danger mr-4" style="background-color: red">
                                    <i class="mdi mdi-delete">Delete</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

