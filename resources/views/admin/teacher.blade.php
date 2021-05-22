@extends('layouts.admin_layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Add new teacher</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> create teacher</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('admin.teacher_store') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputNameuz">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputNameuz" name="name" />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputusernameuz">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="exampleInputusernameuz" name="username" />
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputNameru">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputNameru" name="email"/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputdate">Birthday</label>
                                        <input type="date" class="form-control @error('bday') is-invalid @enderror"
                                               value="{{ old('brith_date') }}" id="exampleInputdate" name="birth_date"/>
                                        @error('bday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputpassword">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputpassword" name="password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputpass">Re-password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="exampleInputpass"/>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="hidden" class="form-control" name="role" value="2" />
                                    </div>
                                    <div class="form-group col-lg-6 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary"> Saqlash </button>
                                    </div>
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
