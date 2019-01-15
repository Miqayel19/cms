@extends('admin.app')

@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->

        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="strudents" active>Students</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Students</h3>
                        <div class="box-tools" style='right:0px;top:3px'>
                            <a class="input-group input-group-sm" href="{{url('api/students/create')}}"
                               style="text-align: right">
                                <button type="button" name="table_search" class="btn btn-success ">Create</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Phone</th>
                            <th>Email address</th>
                            <th>Faculty</th>
                            <th>Group</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->surname}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    @if($student->faculty)
                                        {{$student->faculty->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($student->faculty)
                                        {{$student->group->name}}
                                    @endif
                                </td>
                                <td style="text-align: right">
                                    <a href="{{url('api/students/'.$student->id.'/edit')}}" class="edit"><i
                                                class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_student" data-toggle="modal"
                                       data-target="#modal-primary" data-id="{{$student->id}}"
                                       id="{{$student->id}}">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>
        <div class="modal modal-primary fade delete_modal" id="modal-primary" style="display: none;">

        </div>
    </section>
    <!-- /.content -->

    <script>

        $(document).ready(function () {
            $(document).on('click', '.delete_student', function () {
                var id = $(this).attr('id')
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/students/get-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.delete_modal').html(data);
                    }
                });
            })
        })

    </script>

@endsection