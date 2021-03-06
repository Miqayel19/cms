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
            {!! Form::open(['url'=> 'user/support','method' =>'post', 'files'=>true]) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Answer</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control" name="ticket_id">
                                    @foreach($tickets as $ticket)
                                        <option value={{$ticket->id}}>{{$ticket->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" type="text" rows="10" cols="5" placeholder="Reply" name="message"
                                          @if ($errors->has('message'))
                                          style="border-color: red"
                                        @endif
                                ></textarea>
                                @if ($errors->has('message'))
                                    <span style="color: red">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose file</label>
                                <div class="input-group">
                                    <input type="file" name="upload" id="file"
                                           @if ($errors->has('upload'))
                                           style="color: red"
                                            @endif
                                    >
                                    @if ($errors->has('upload'))
                                        <span style="color: red">{{ $errors->first('upload') }}</span>
                                    @endif

                                </div>
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
        {!! Form::close() !!}
    </section>

@endsection
