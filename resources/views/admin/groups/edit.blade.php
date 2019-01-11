@extends('admin.app')
@section('content')

    <section class="content-header">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Groups</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            {!! Form::open(['url'=> '/api/groups/'.$group->id,'method'=> 'PUT']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Group edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Group name" value="{{$group->name}}" name="name">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Faculty Name</label>
                                <select class="form-control" name="fac_id">
                                    @if($faculties)
                                        @foreach($faculties as $faculty)
                                            <option value={{$faculty->id}} @if($group->fac_id == $faculty->id) selected @endif>{{$faculty->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
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