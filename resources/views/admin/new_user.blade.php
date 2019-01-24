@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/users">Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> '/admin/users','files' => true, 'enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">User Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="User name" name="name"
                                       @if ($errors->has('name'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('name'))
                                    <span style="color: red">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Surname</label>
                                <input class="form-control" type="text" placeholder="User surname" name="surname"
                                       @if ($errors->has('surname'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('surname'))
                                    <span style="color: red">
                                        {{ $errors->first('surname') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Father name</label>
                                <input class="form-control" type="text" placeholder="User father name" name="fathername"
                                       @if ($errors->has('fathername'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('fathername'))
                                    <span style="color: red">
                                        {{ $errors->first('fathername') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Please enter the phone number +374XXXXXX " name="phone"
                                       @if ($errors->has('phone'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('phone'))
                                    <span style="color: red">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="User city" name="city"
                                       @if ($errors->has('city'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('city'))
                                    <span style="color: red">
                                        {{ $errors->first('city') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="User email" name="email"

                                       @if ($errors->has('email'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('email'))
                                    <span style="color: red">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="text" placeholder="User password" name="password"
                                       @if ($errors->has('password'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('password'))
                                    <span style="color: red">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" type="text" placeholder="User company name" name="company"

                                       @if ($errors->has('company'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('company'))
                                    <span style="color: red">
                                        {{ $errors->first('company') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose image</label>
                                <div class="input-group">
                                    <input type="file" name="image" id="image"
                                           @if ($errors->has('image'))
                                           style="color: red"
                                            @endif
                                    >
                                    <input type="hidden" name="x1" value=""/>
                                    <input type="hidden" name="y1" value=""/>
                                    <input type="hidden" name="w" value=""/>
                                    <input type="hidden" name="h" value=""/><br><br>
                                    <p><img id="previewimage" style="display:none;"/></p>
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
    </section>
    {!! Form::close() !!}
    <script>

        jQuery(function ($) {

            var p = $("#previewimage");
            $("body").on("change", "#image", function () {

                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.getElementById("image").files[0]);

                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                };
            });

            $('#previewimage').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);
                }
            });
        });

    </script>
@endsection
