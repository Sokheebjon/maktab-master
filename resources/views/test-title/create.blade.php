@extends('layouts.teacher_layout')

@section('content')
    <div class="col-12 grid-margin stretch-card mt-5 pt-5">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="{{route('teacher.test-title.store')}}">
                    @csrf
                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-lg-9">
                            <h4 class="card-title">Enter test title</h4>
                            <div class="form-group">
                                <input type="text" class="form-control @error('title_uz') is-invalid @enderror"
                                       id="exampleInputName1" placeholder="Name"
                                       value="{{old('title_uz')}}"
                                       name="title_uz">
                                @error('title_uz')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-top: 11px">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Subject</label>
                                <select class="form-control form-control-lg" name="subject_id"
                                        id="exampleFormControlSelect1">
                                    @foreach($subjects as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="test-content edited p-3 mb-3" style="background: rgb(223, 223, 223)">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="exampleInputName1">Question <span class="counter">1</span></label>
                                    <input type="text" class="form-control question" name="question[]" id="exampleInputName1" placeholder="Enter Question">
                                    <input type="text" class="hiddens d-none" value="0" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control form-control-lg type" style="padding: 0.5375rem 0.75rem; cursor:pointer;" id="exampleFormControlSelect1"
                                            name="question_type_id[0][2]"
                                            oninput="changing_type(this)">
                                        @foreach($type as $t)
                                            <option value="{{ $t->id }}">{{ $t->type }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="hidden_type_value d-none" name="hidden_type[]" value="2">
                                </div>
                            </div>
                            <div class="col-lg-1" style="margin-top: 28px; padding: 0">
                                <i class="mdi mdi-plus menu-icon mt-3 text-white font-weight-bold"
                                   onclick="add_test(this)" style="background: green; padding:8.5px 10px; cursor:pointer;"></i>
                                <i class="mdi mdi-delete menu-icon mt-3 text-white font-weight-bold"
                                   onclick="remove_test(this)" style="background: #ff0000; padding:8.5px 10px; cursor: pointer"></i>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <a class="btn btn-info text-white" onclick="add_answer(this)" style="margin-right: 30px;border: 0;border-radius: 0;">
                                    Add answer
                                </a>
                            </div>
                        </div>
                        <div class="row">
                                <div class="answer_input col-lg-6">
                                    <div class="row mr-3">
                                        <div class="form-group col-lg-2 " style="padding-right: 0 !important;">
                                            <input type="hidden" class="set_check" name="is_check[0][0]" value="0">
                                            <input type="checkbox" class="form-control"
                                                   onchange="change(this)"
                                                   name="answer_type_id[0]"
                                                   style="transform: scale(1.3); margin-top: 35px; cursor:pointer;"/>
                                        </div>
                                        <div class="form-group col-lg-8" style="padding-left: 0 !important;">
                                            <label for="exampleInputName1">Answer <span class="variant">A</span></label>
                                            <input type="text" required class="form-control ans" id="exampleInputName1"
                                                   name="answer[0][0]">
                                            <input type="text" class="ans_hidden" value="0">
                                        </div>
                                        <div class="col-lg-2" style="margin-top: 30px; padding: 0">
                                            <i class="mdi mdi-delete menu-icon mt-3 text-white font-weight-bold"
                                               onclick="remove_answer(this)" style="background: red; padding:8px 10px; cursor:pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded-0" style="border-radius: 0">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
