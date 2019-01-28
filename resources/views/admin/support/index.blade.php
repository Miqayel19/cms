@extends('admin.app')

@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="support" active>Support</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Support ticket</h3>
                    <div class="box-tools" style='right:0px;top:3px'>
                        <a class="input-group input-group-sm" href="{{url('user/support/new_ticket')}}"
                           style="text-align: right">
                            <button type="button" name="table_search" class="btn btn-success ">Create</button>
                        </a>
                    </div>
                </div>
            </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Theme</th>
                            <th>Date</th>
                            <th style="text-align: right">Action</th>
                        @if($support)
                        @foreach($support as $res)
                            <tr>
                                <td>{{$res->id}}</td>
                                <td>

                                    @if($res->tickets)
                                        <a href="{{url('admin/tickets/'.$res->tickets->id)}}" class="edit">{{$res->tickets->title}}</a>
                                    @endif
                                </td>
                                <td>{{$res->created_at}}</td>
                                <td style="text-align: right">
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="{{$res->id}}" id="{{$res->id}}">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
                    url: '/user/support/tickets/get-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.delete_modal').html(data);
                    }
                });
            })
        })

    </script>

@endsection