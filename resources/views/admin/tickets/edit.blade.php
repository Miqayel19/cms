@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="tickets">Tickets</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> 'admin/tickets/'.$ticket->id,'method'=> 'PUT']) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ticket Edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" value="{{$ticket->title}}" name="title"
                                       @if ($errors->has('title'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('title'))
                                    <span style="color: red">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Summary</label>
                                <input class="form-control" type="text" value="{{$ticket->summary}}" name="summary"
                                       @if ($errors->has('summary'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('summary'))
                                    <span style="color: red">{{ $errors->first('summary') }}</span>
                                @endif
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
        {!! Form::close() !!}
        <!-- /.box-body -->
        </div>
    </section>

@endsection