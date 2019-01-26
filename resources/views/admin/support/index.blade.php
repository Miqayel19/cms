@extends('admin.app')

@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="users"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="tickets" active>Tickets</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Support theme</h3>
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
                        </tr>

                        @foreach($tickets as $res)
                            <tr>
                                <td>{{$res->id}}</td>
                                <td>{{$res->theme}}</td>
                                <td>{{$res->created_at}}</td>
                            </tr>
                        @endforeach

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