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
                            <th>Header</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Summary</th>
                            <th>User</th>
                            <th>Date</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        @if($new)
                            <tr>
                                <td>{{$new->id}}</td>
                                <td>{{$new->header}}</td>
                                <td>{{$new->description}}</td>
                                <td>{{$new->image}}</td>
                                <td>{{$new->user->id}}</td>
                                <td>{{$new->date}}</td>
                                <td style="text-align: right">
                                    <a href="{{url('admin/news/'.$new->id.'/edit')}}" class="edit"><i class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="{{$new->id}}" id="{{$new->id}}">
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