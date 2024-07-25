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
                            <h1>Exam Schedule</h1>
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
                                        Search Exam Schedule
                                </div>
                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Exam</label>
                                                <select class="form-control" name="exam_id">
                                                    <option value="">Select</option>
                                                    @foreach ($getExam as $exam)
                                                        <option {{(Request::get('exam_id') == $exam->id) ? 'selected' : ''}}
                                                            value="{{$exam->id}}">{{$exam->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Class</label>
                                                <select class="form-control" name="class_id">
                                                    <option value="">Select</option>
                                                    @foreach ($getClass as $class)
                                                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                                            value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>
                                                <a href="{{url('/admin/examinations/exam/list')}}"
                                                    class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>

                           
                            @if(!empty($getRecord))

                                                        <form action={{url("/admin/examinations/exam_schedule_insert")}} method="post">
                                                            {{csrf_field()}}

                                                            <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                                                            <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">


                                                            <div class="card" style="overflow:auto;">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Exam Schedule</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body p-0">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>

                                                                                <th>SubjectName</th>
                                                                                <th>Date</th>
                                                                                <th>StartTime</th>
                                                                                <th>EndTime</th>
                                                                                <th>RoomNumber</th>
                                                                                <th>FullMarks</th>
                                                                                <th>Passing Marks</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $i = 1;
                                                                            @endphp

                                                                            @foreach ($getRecord as $value)
                                                                                <tr>
                                                                                    <td>{{ $value['subject_name']}}
                                                                                        <input type="hidden" class="form-control" value="{{$value['subject_id']}}" name="schedule[{{$i}}][subject_id]"> 
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="date" class="form-control"
                                                                                            name="schedule[{{$i}}][exam_date]">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="time" class="form-control"
                                                                                            name="schedule[{{$i}}][start_time]">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="time" class="form-control"
                                                                                            name="schedule[{{$i}}][end_time]">
                                                                                    </td>
                                                                                   
                                                                                    <td>
                                                                                        <input type="text" class="form-control"
                                                                                            name="schedule[{{$i}}][room_number]">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control"
                                                                                            name="schedule[{{$i}}][full_marks]">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control"
                                                                                            name="schedule[{{$i}}][passing_mark]">
                                                                                    </td>
                                                                                </tr>

                                                                                @php
                                                                            $i++;
                                                                        @endphp
                                                                            @endforeach
                                                                        </tbody>
                                                                        

                                                                    </table>

                                                                    <div style="text-align: center; padding:20px">
                                                                        <button class="btn btn-primary">Submit</button>
                                                                    </div>


                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                                <!-- /.card -->
                                                            </div>
                                                        </form>
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
</body>

</html>