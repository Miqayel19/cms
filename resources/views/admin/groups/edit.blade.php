@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="../dashboard><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../groups">Groups</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> '/api/groups/'.$group->id,'method'=> 'PUT']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Group edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Group name" value="{{$group->name}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
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
                        <div class="row" style="text-align: right">
                            <div class="col-md-12">
                                <div class="form-group">
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
    </section>


@endsection