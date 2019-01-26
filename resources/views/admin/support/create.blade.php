@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/tickets">Tickets</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> 'user/support','method' =>'post']) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Theme Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Theme</label>
                                <input class="form-control" type="text" placeholder="Ticket theme" name="theme" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align: right">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="window.history.back()">Cancel</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    {!! Form::close() !!}
@endsection
