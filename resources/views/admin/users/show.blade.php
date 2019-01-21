@extends('admin.app')

@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="users"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="users" active>Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Father name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Company</th>
                            <th>Image</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        @if($user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->fathername}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->company}}</td>
                                <td>{{$user->image}}</td>
                                <td style="text-align: right">
                                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="edit"><i class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="{{$user->id}}" id="{{$user->id}}">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
        </div>
        <div class="modal modal-primary fade delete_modal" id="modal-primary" style="display: none;"></div>
    </section>
    <!-- /.content -->

    <script>

        $(document).ready(function () {
            $(document).on('click', '.delete_group', function () {
                var id = $(this).attr('id')
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/groups/get-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.delete_modal').html(data);
                    }
                });
            })
        })

    </script>

@endsection