@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="../dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../groups">Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url'=> '/admin/users/'.$user->id,'method'=> 'PUT','files' => true, 'enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">User Edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="{{$user->name}}" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Surname</label>
                                <input class="form-control" type="text" value="{{$user->surname}}" name="surname" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Father name</label>
                                <input class="form-control" type="text" value="{{$user->fathername}}" name="fathername" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" value="{{$user->phone}}" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" type="text" value="{{$user->city}}" name="city" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="{{$user->email}}" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="text" value="{{$user->password}}" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" type="text" value="{{$user->company}}" name="company" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose image</label>
                                <div class="input-group">
                                    <input id="file" type="file" name="image">
                                    <img id="result">
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
        {!! Form::close() !!}
            <!-- /.box-body -->
        </div>
    </section>



@endsection