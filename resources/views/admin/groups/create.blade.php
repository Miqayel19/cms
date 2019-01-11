@extends('admin.app')
@section('content')

    <section class="content-header">

        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Groups</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            {!! Form::open(['url'=> '/api/groups']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Group Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Group name" name="name" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="groupFaculty">Choose Faculty</label>
                                <select class="form-control" name="fac_id">
                                    @foreach($faculties as $faculty)
                                        <option value={{$faculty->id}}>{{$faculty->name}}</option>
                                    @endforeach
                                </select>
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
