@extends('admin.app')

@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="news" active>News</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
                <!-- /.box-header -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create News</h3>
                    <div class="box-tools" style='right:0px;top:3px'>
                        <a class="input-group input-group-sm" href="{{url('user/news/create')}}"
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
                            <th>Header</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Summary</th>
                            <th>User</th>
                            <th style="text-align: right">Date</th>
                        </tr>
                        @if($news)
                        @foreach($news as $new)
                            <tr>
                                <td>{{$new->id}}</td>
                                <td>{{$new->header}}</td>
                                <td>{{$new->description}}</td>
                                <td>{{$new->image}}</td>
                                <td>{{$auth_uphpser}}</td>
                                <td style="text-align: right">{{$new->date}}</td>
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