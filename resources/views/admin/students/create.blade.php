@extends('admin.app')
@section('content')

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="../dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../students">Students</a></li>
        </ol>
    </section>

    <section class="content">
           <div class="row">
            {!! Form::open(['url'=> '/api/students']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    @if(isset($errors) && $errors->has('name'))
                                        <input class="form-control" type="text" placeholder="Student name" name="name"
                                                      required style="border-color: red">
                                    @else
                                        <input class="form-control" type="text" placeholder="Student name" name="name"
                                                      required>
                                    @endif
                                </div>
                        </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Surname</label>
                                           <input class="form-control" type="text" placeholder="Student surname" name="surname"
                                                  required>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Phone</label>
                                           <input class="form-control" type="text" placeholder="Student phone number" name="phone"
                                                  required>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Email address</label>
                                           <input class="form-control" type="text" placeholder="Student email" name="email"
                                                  required>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="groupFaculty">Choose Faculty</label>
                                            <select class="form-control fac_info" name="fac_id">
                                                <option>All</option>
                                                @foreach($faculties as $faculty)
                                                    <option value={{$faculty->id}}>{{$faculty->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class='form-group'
                                            <label for="groupFaculty">Choose Group</label>
                                            <select class="form-control group_info" name="group_id"></select>
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
                </div>
           </div>
        </section>
                <!-- /.box-body -->
            {!! Form::close() !!}
    <script>

        $(document).ready(function () {
            $(document).on('change', '.fac_info', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/students/get-info-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.group_info').html(data);
                    }
                });
            })
        })

    </script>
@endsection
