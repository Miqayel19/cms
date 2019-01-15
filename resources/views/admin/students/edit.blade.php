@extends('admin.app')
@section('content')

    <section class="content-header">

        <!-- /.row -->
        <ol class="breadcrumb"  style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Students</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            {!! Form::open(['url'=> '/api/students/'.$student->id,'method'=> 'PUT']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Student edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Student name" value="{{$student->name}}" name="name">
                                <br>
                                <label>Surname</label>
                                <input class="form-control" type="text" placeholder="Student surname" value="{{$student->surname}}" name="surname">
                                <br>
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Student phone" value="{{$student->phone}}" name="phone">
                                <br>
                                <label>Email address</label>
                                <input class="form-control" type="text" placeholder="Student email" value="{{$student->email}}" name="email">
                                <br>
                                <label>Faculty Name</label>

                                <select class="form-control fac_val" name="fac_id">
                                    @if(isset($faculties)){
                                        @foreach($faculties as $faculty)
                                            <option value={{$faculty->id}}  @if($student->fac_id == $faculty->id) selected @endif>{{$faculty->name}}</option>
                                        @endforeach
                                        }
                                    @endif
                                </select>
                                <br>
                                <label>Group Name</label>
                                        @if($student->group)
                                <select class="form-control group_val" name="group_id" id ={{$student->group->fac_id}}>
                                    <option value={{$student->group->id}} selected="selected">{{$student->group->name}}</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <br>
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

    <script>

        $(document).ready(function () {
            $(document).on('change', '.fac_val', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/students/get-info-by-ajax',
                    data: {id: id},
                    success: function (data) {

                        $('.group_val').html(data);
                    }
                });
            })
        })

    </script>

@endsection