@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">

        <a href="{{asset('user/support')}}" class="edit"><i class="fa fa-fw fa-arrow-left"></i>
            Back
        </a>
    </section>
    <section class="content" style="padding:15px">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="row">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Theme: {{$res->tickets->title}}</h3>
                </div>
                <div class="box-body">
                    <form id="myForm" name="myForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" id="message" type="text" rows="5" cols="5"
                                              placeholder="Answer" name="message"
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
                                    </div>
                                    <input type="hidden" id="ticket" value="{{$res->tickets->id}}" name="ticket_id">
                                    <input type="hidden" id="user"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->name}}" name="user">
                                    <input type="hidden" id="support" value="{{$res->id}}" name="support_id">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="text-align: right">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-success" id="send" type="submit">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="second">
            <div class="post clearfix">
                <div class="user-block">
                    @foreach($support as $value)
                        <div>
                            <span class="username">
                                <i class="fa fa-user"> {{\Illuminate\Support\Facades\Auth::user()->name}}</i>
                            </span>
                            <message style="margin-left:6%">Message: {{$value->message}}</message>
                            <time style="float:right">Time: {{$value->created_at->format('H:m:s/m-d-Y')}}</time>
                        </div>
                    @endforeach
                </div>
                <!-- /.user-block -->
            </div>
        </div>

    </section>

    <script>

        $(document).ready(function () {
            $('#myForm').on('submit', function (event) {
                event.preventDefault()
                var myForm = document.getElementById('myForm');
                var formData = new FormData(myForm);
                var message = $('#message').val()
                var ticket_id = $('#ticket').val()
                var user = $('#user').val()
                var file = document.getElementById('file').files[0];
                formData.append('message', message);
                formData.append('ticket_id', ticket_id);
                formData.append('user', user);
                formData.append('file', file);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/user/support/get-by-ajax',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('.second').html(data);

                    }

                });

            })
        })

    </script>

@endsection
