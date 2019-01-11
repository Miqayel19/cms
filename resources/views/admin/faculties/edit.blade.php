@extends('admin.app')
@section('content')

    <section class="content-header">

        <!-- /.row -->
        <ol class="breadcrumb"  style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Faculties</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            {!! Form::open(['url'=> '/api/faculties/'.$faculty->id,'method'=> 'PUT']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Faculty edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Faculty name"
                                       value="{{$faculty->name}}" name="name">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align: right">
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-danger" type="button" onclick="window.history.back()">Cancel</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection