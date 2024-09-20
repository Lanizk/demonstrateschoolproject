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
    <link rel="stylesheet" href="/../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/../../dist/css/adminlte.min.css">
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
                            <h1>Student Attendance</h1>
                        </div>
                    </div>
                   
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
                                        Search Student Attendance
                                </div>
                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                           
                                            <div class="form-group col-md-3">
                                                <label>Class</label>
                                                <select class="form-control" name="class_id" id="getClass" required required>
                                                    <option value="">Select</option>
                                                    @foreach ($getClass as $class)
                                                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                                        value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Date</label>
                                                <input type="date" class="form-control" id="getAttendanceDate" value="{{Request::get('attendance_date')}}" required name="attendance_date">
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>
                                                <a href="{{url('admin/attendance/student')}}"
                                                    class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                         
                            @if(!empty(Request::get('class_id'))&& !empty(Request::get('attendance_date')))

                            
                                                <div class="card" style="overflow:auto;">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Student List</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0" style="overflow:auto;">
                                                        <table class="table table-stripped">
                                                            <thead>
                                                                <tr>
                                                                <th>Student Id</th>
                                                                    <th>Student Name</th>
                                                                    <th>Student Attendance</th>
</tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(!empty($getStudent) && !empty($getStudent->count()))
                                                            @foreach($getStudent as $value)

                                                            @php
                                                            $attendance_type='';
                                                            $getAttendance=$value->getAttendance($value->id,Request::get('class_id'),Request::get('attendance_date'));
                                                            if(!empty($getAttendance->attendance_type))
                                                            {
                                                                $attendance_type=$getAttendance->attendance_type;
                                                            }
                                                            @endphp
                                                            <tr>
                                                                <td>{{$value->id}}</td>
                                                                <td>{{$value->name}} {{$value->last_name}}</td>
                                                                <td>
                                                                    <label style="margin: right 10px;">
                                                                        <input value="1" type="radio" id="{{$value->id}}" {{($attendance_type=='1')? 'checked':''}} class="SaveAttendance" name="attendance {{$value->id}}">Present</label>
                                                                    <label style="margin: right 10px;">
                                                                        <input value="2" type="radio" id="{{$value->id}}" {{($attendance_type=='2')? 'checked':''}} class="SaveAttendance" name="attendance {{$value->id}}">Late</label>
                                                                    <label style="margin: right 10px;">
                                                                        <input value="3" type="radio" id="{{$value->id}}" {{($attendance_type=='3')? 'checked':''}} class="SaveAttendance" name="attendance {{$value->id}}">Absent</label>
                                                                    <label >
                                                                        <input value="4" type="radio" id="{{$value->id}}" {{($attendance_type=='4')? 'checked':''}} class="SaveAttendance" name="attendance {{$value->id}}">Half Day</label>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
</div>
                            @endif
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/../../dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
       
        $('.SaveAttendance').change(function (e) {
            var student_id = $(this).attr('id');
            var attendance_type=$(this).val();
            var class_id = $('#getClass').val();
            var attendance_date=$('#getAttendanceDate').val();
         

            $.ajax({
                type: "POST",
                url: "{{url('admin/attendance/student/save')}}",
                data: {
                    "_token": "{{csrf_token()}}",
                    student_id:student_id,
                    attendance_type:attendance_type,
                    class_id:class_id,
                    attendance_date:attendance_date,
           
                },
                dataType: "json",
                success: function (data) {
                    alert(data.message);
                }
            });
        });

    </script>
  
   
</body>

</html>