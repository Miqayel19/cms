@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../news">News</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> 'admin/user/news']) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">News Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Header</label>
                                <input class="form-control" type="text" placeholder="News title" name="header"
                                       @if ($errors->has('header'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('header'))
                                    <span style="color: red">{{ $errors->first('header') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Summary</label>
                                <input class="form-control" type="text" placeholder="news summary" name="summary"
                                       @if ($errors->has('summary'))
                                       style="border-color: red"
                                        @endif>
                                @if ($errors->has('summary'))
                                    <span style="color: red">{{ $errors->first('summary') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" type="text" placeholder="News description" name="description"
                                       @if ($errors->has('description'))
                                       style="border-color: red"
                                        @endif
                                >
                                @if ($errors->has('description'))
                                    <span style="color: red">{{ $errors->first('description') }}</span>
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
                                <button class="btn btn-danger" type="button" onclick="window.history.back()">
                                    Cancel
                                </button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
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
