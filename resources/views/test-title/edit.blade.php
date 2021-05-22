@extends('layouts.teacher_layout')

@section('content')
    <div class="col-12 grid-margin stretch-card mt-5 pt-5">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="{{route('teacher.test-title.update', $test_title->id)}}">
                    @csrf
                    @method("PUT")
                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-lg-9">
                            <h4 class="card-title">Enter test title</h4>
                            <div class="form-group">
                                <input type="text" class="form-control @error('title_uz') is-invalid @enderror"
                                       id="exampleInputName1" placeholder="Name"
                                       name="title_uz" value="{{$test_title->title_uz}}">
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
                                        <option value="{{ $sub->id }}"
                                                @if($sub->id == $test_title->subject_id) selected @endif>{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @foreach($questions as $val => $q)
                    <div class="test-content edited p-3 mb-3" data-id="{{$q->id}}" style="background: rgb(223, 223, 223)">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="exampleInputName1">Question <span class="counter">{{++$val}}</span></label>
                                    <input type="text" class="form-control question"
                                           id="exampleInputName1"
                                           value="{{$q->question}}"
                                           placeholder="Enter Question"
                                           name="question[]">
                                    <input type="text" class="hiddens" name="question_id[]" value="{{ $q->id}}" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control form-control-lg type" style="padding: 0.5375rem 0.75rem; cursor:pointer;" id="exampleFormControlSelect1"
                                            name="question_type_id[{{$q->id}}][{{$q->type_id}}]"
                                            oninput="changing_type(this)">
                                        @foreach($type as $t)
                                            <option value="{{ $t->id }}"
                                                    @if($t->id == $q->type_id) selected @endif>{{ $t->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1" style="margin-top: 30px; padding: 0">
                                <i class="mdi mdi-plus menu-icon mt-3 text-white font-weight-bold"
                                   onclick="add_test(this)" style="background: green; padding:7px 10px"></i>
                                <i class="mdi mdi-delete menu-icon mt-3 text-white font-weight-bold" data-id="{{$q->id}}"
                                   onclick="remove_test(this)" style="background: red; padding:7px 10px"></i>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <a class="btn btn-info text-white" onclick="add_answer(this)" style="margin-right: 30px;border: 0;border-radius: 0;">
                                    Add answer
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach(\App\Models\Answer::where('question_id', $q->id)->get() as $ans)
                            <div class="answer_input col-lg-6">
                                <div class="row mr-3">
                                    <div class="form-group col-lg-2 " style="padding-right: 0 !important;">
                                        <input type="hidden" class="set_check" name="is_check[{{$q->id}}][{{$ans->id}}]" value="@if($ans->is_true == 1) 1 @else 0 @endif">
                                        <input @if($q->type_id == 2) type="checkbox" @elseif($q->type_id == 1) type="radio" name="question_type_id[{{$q->id}}][{{$q->type_id}}]" @endif class="form-control"
                                               @if($ans->is_true == 1) checked @endif
                                               onchange="change(this)"
                                               style="transform: scale(1.3); margin-top: 35px"/>
                                    </div>
                                    <div class="form-group col-lg-8" style="padding-left: 0 !important;">
                                        <label for="exampleInputName1">Answer <span class="variant" data-question_id="{{$q->id}}">A</span></label>
                                        <input type="text" required class="form-control ans" id="exampleInputName1" value="{{$ans->answer}}"
                                               name="answer[{{$q->id}}][{{$ans->id}}]">
                                        <input type="text" class="ans_hidden" value="{{ $ans->id }}">
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 30px; padding: 0">
                                        <i class="mdi mdi-delete menu-icon mt-3 text-white font-weight-bold"
                                            onclick="remove_answer(this)" data-answer_id="{{$ans->id}}" style="background: red; padding:7px 10px"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                        @endforeach
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded-0"> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

