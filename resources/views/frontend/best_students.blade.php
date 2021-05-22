@extends('layouts.app')
@section('content')
    <section class="hero hero-page">
        <div style="background: url(/home_style/img/courses-banner.jpg)" class="hero-banner">       </div>
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Best-students - table</li>
                </ol>
            </nav>
            <h1>Best students</h1>
            <div class="row">
                <p class="col-lg-8">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos.</p>
            </div>
        </div>
    </section>
    <!-- Course Listing Section-->
    <section class="courses-listing bg-gray">
        <div class="container">
            <div class="courses-table">
                <div class="courses-table-header bg-primary d-flex justify-content-between align-items-center flex-column flex-md-row">
                    <div class="left">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">{{count($all_group)}} classes</li>
                            <li class="list-inline-item">{{count(\App\Models\User::get())}} students</li>
                        </ul>
                    </div>
                    <div class="right">
                        <select data-style="btn-outline-light" class="selectpicker">
                            @foreach($all_group as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="courses-table-body">
                    <table class="table table-hover table-responsive-xl" id="table_id">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Group</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($raiting as $key => $rating)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <a href="javascript:void(0)" class="no-anchor-style">{{$rating->users->name}}{{$rating->user_id}}</a>
                            </td>
                            <td>{{$rating->group->name}}</td>
                            <td>@if(is_null($rating->mark)) null @else {{number_format($rating->mark, 2)}} @endif</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                {{$raiting->links()}}
            </nav>
        </div>
    </section>
    <script>
        $(document).ready(function (e) {
            $('select').on('change', function (e) {
                let selected = this.value;
                $.ajax({
                    url: "/best_students",
                    type: "GET",
                    dataType: 'json',
                    data: {
                        selected: selected,
                    },
                    success: function (data) {
                        console.log(data);
                        $("#table_id > tbody").empty();
                        data.forEach(function (obj, index) {
                            $("tbody").append('<tr>' +
                                '<td>' + ++index + '</td>' +
                                '<td>' + obj.users.name + '</td>' +
                                '<td>' + obj.group.name + '</td>' +
                                '<td>' + obj.mark + '</td></tr>')
                        });
                    },
                    error: function (error) {
                        console.log(error)
                    },
                });
            });
        });
    </script>
@endsection
