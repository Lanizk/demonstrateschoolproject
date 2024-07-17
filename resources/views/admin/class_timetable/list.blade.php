<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{!empty($header_title) ? $header_title : ''}}-School </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layout.header');
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Class Timetable List</h1>
                        </div>
                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/class_timetable/add')}}" class="btn btn-primary">Add new Class
                                Timetable</a>
                        </div>
                    </div>
                    @include('_message')
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Search Class TimeTable List
                                </div>
                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Class Name</label>
                                                <select class="form-control getClass" name="class_id" required>
                                                    <option value="">Select</option>
                                                    @foreach($getClass as $class)
                                                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                                            value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Subject Name</label>
                                                <select class="form-control getSubject" name="subject_id" required>
                                                    <option value="">Select</option>
                                                    @if(!empty($getSubject))
                                                    @foreach($getSubject as $subject)
                                                        <option {{(Request::get('subject_id') == $subject->subject_id) ? 'selected' : ''}}
                                                            value="{{$subject->subject_id}}">{{$subject->subject_name}}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>
                                                <a href="{{url('admin/class_timetable/list')}}" class="btn btn-success"
                                                    style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>


                            </div>
                            @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
                             <form action={{url("/admin/class_timetable/add")}} method="post">
                                {{csrf_field()}}

                                <input type="hidden" name="subject_id" value="{{Request::get('subject_id')}}">
                                <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Class  TimeTable</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Week</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th> Room Number</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $i=1;
                                        @endphp
                                        <tbody>
                                       @foreach ($week as $value )
                                       <tr>
                                        <th>
                                        <input type="hidden" name="timetable[{{$i}}][week_id]" value="{{Request::get('week_id')}}">
                                        {{ $value['week_name']}}</th>
                                        <td>
                                            <input type="time" name="timetable[{{$i}}][start_time]" class="form-control">
                                        </td>

                                        <td>
                                            <input type="time" name="timetable[{{$i}}][end_time]" class="form-control">
                                        </td>

                                        <td>
                                            <input type="text" style="width:200px;" name="timetable[{{$i}}][room_number]" class="form-control">
                                        </td>

                                       </tr>
                                       @php
                                       $i++;
                                       @endphp
                                       @endforeach
                                        </tbody>
                                    </table>

                                    <div style="text-align: center; padding:20px" >
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                    

                                        
                                        
                                    </div>
                                      
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->
                            </div>
                        </form>

                            @endif

                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        $('.getClass').change(function () {
            var class_id = $(this).val();
            $.ajax({
                url: "{{url('/admin/class_timetable/get_subject')}}",
                type: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function (response) {
                    $('.getSubject').html(response.html);

                },
            });
        });
    </script>
</body>

</html>