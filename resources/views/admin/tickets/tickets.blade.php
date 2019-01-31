@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="tickets" active>Tickets</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
                <!-- /.box-header -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create  ticket</h3>
                    <div class="box-tools" style='right:0px;top:3px'>
                        <a class="input-group input-group-sm" href="{{url('admin/tickets/create')}}"
                           style="text-align: right">
                            <button type="button" name="table_search" class="btn btn-success ">Create</button>
                        </a>
                    </div>
                </div>
            </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Answer</th>
                            <th>File</th>
                            <th style="min-width: 132px">Date</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        @if($tickets)
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{$ticket->id}}</td>
                                <td>{{$ticket->title}}</td>
                                <td>{{$ticket->summary}}</td>
                                <td>{{$ticket->answer}}</td>
                                <td>{{$ticket->file}}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td style="text-align: right;width:76px">
                                    <a href="{{url('admin/tickets/'.$ticket->id.'/edit')}}" class="edit"><i class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="{{$ticket->id}}" id="{{$ticket->id}}">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                    <a href="{{url('admin/tickets/'.$ticket->id)}}" class="edit"><i class="fa fa-fw fa-eye"></i></a>
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
                    url: '/admin/tickets/get-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.delete_modal').html(data);
                    }
                });
            })
        })

    </script>

@endsection