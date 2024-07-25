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
                            <h1>Marks Register</h1>
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
                                        Search Marks Register
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
                                                <a href="{{url('admin/examinations/marksregister')}}"
                                                    class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            @if(!empty($getSubject) && !empty($getSubject->count()))
                                                <div class="card" style="overflow:auto;">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Marks Register</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STUDENTNAME</th>
                                                                    @foreach ($getSubject as $subject)
                                                                                                                                                                                                                                                                        <th>{{$subject->subject_name}}<br>
                                                                            ({{$subject->subject_type}}:{{$subject->passing_mark}}/{{$subject->full_marks}})
                                                                        </th>
                                                                    @endforeach
                                                                                                                                                                                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!empty($getStudent) && !empty($getStudent->count()))
                                                                                                    @foreach ($getStudent as $student)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <form name="post" class="SubmitForm">
                                                                                                                                            {{csrf_field()}}
                                                                                                                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                                                                                                                            <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                                                                                                                                            <input type="hidden" name="class_id"
                                                                                                                                                value="{{Request::get('class_id')}}">
                                                                                                                                            <tr>
                                                                                                                                                <td>{{$student->name}}{{$student->last_name}}</td>
                                                                                                                                                @php
                                                                                                                                                    $i = 1;
                                                                                                                                                   @endphp
                                                                                                                                                @foreach ($getSubject as $subject)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           @endphp
                                                                                                                                                                                        <td>
                                                                                                                                                                                            <div style="margin-bottom: 10px;">
                                                                                                                                                                                                Class Work
                                                                                                                                                                                                <input type="hidden" name="mark[{{$i}}][id]"
                                                                                                                                                                                                    value="{{$subject->id}}">
                                                                                                                                                                                                <input type="hidden" name="mark[{{$i}}][subject_id]"
                                                                                                                                                                                                    value="{{$subject->subject_id}}">
                                                                                                                                                                                                <input type="text" name="mark[{{$i}}][class_work]"
                                                                                                                                                                                                    id="class_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                                                                                                                                    style="width: 200px;" class="form_control"
                                                                                                                                                                                                    placeholder="Enter Marks"
                                                                                                                                                                                                    value="{{!empty($getMark->class_work) ? $getMark->class_work : ''}}">
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div style="margin-bottom: 10px;">
                                                                                                                                                                                                Home Work
                                                                                                                                                                                                <input type="text" name="mark[{{$i}}][home_work]"
                                                                                                                                                                                                    id="home_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                                                                                                                                    style="width: 200px;" class="form_control"
                                                                                                                                                                                                    placeholder="Enter Marks"
                                                                                                                                                                                                    value="{{!empty($getMark->home_work) ? $getMark->home_work : ''}}">
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div style="margin-bottom: 10px;">
                                                                                                                                                                                                Test Work
                                                                                                                                                                                                <input type="text" name="mark[{{$i}}][test_work]"
                                                                                                                                                                                                    id="test_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                                                                                                                                    style="width: 200px;" class="form_control"
                                                                                                                                                                                                    placeholder="Enter Marks"
                                                                                                                                                                                                    value="{{!empty($getMark->test_work) ? $getMark->test_work : ''}}">
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div style="margin-bottom: 10px;">
                                                                                                                                                                                                Exam Work
                                                                                                                                                                                                <input type="text" name="mark[{{$i}}][exam_work]"
                                                                                                                                                                                                    id="exam_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                                                                                                                                                    style="width: 200px;" class="form_control"
                                                                                                                                                                                                    placeholder="Enter Marks"
                                                                                                                                                                                                    value="{{!empty($getMark->exam_work) ? $getMark->exam_work : ''}}">
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div style="margin-bottom: 10px;">
                                                                                                                                                                                                <button type="button"
                                                                                                                                                                                                    class="btn btn-primary SaveSingleSubject"
                                                                                                                                                                                                    id="{{$student->id}}"
                                                                                                                                                                                                    data-val="{{$subject->subject_id}}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  "
                                                                                                                                                                                                    data-exam="{{Request::get('exam_id')}}"
                                                                                                                                                                                                    data-class="{{Request::get('class_id')}}"
                                                                                                                                                                                                    data-schedule="{{$subject->id}}">Save</button>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </td>
                                                                                                                                                                                        @php
                                                                                                                                                                                            $i++;
                                                                                                                                                                                           @endphp
                                                                                                                                                @endforeach
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                    <button type="submit" class="btn btn-success">Save</button>
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                        </form>
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
        $('.SubmitForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{url('admin/examinations/submit_marks_register')}}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    alert(data.message);
                }
            });
        });

        $('.SaveSingleSubject').click(function (e) {
            var student_id = $(this).attr('id');
            var subject_id = $(this).attr('data-val');
            var exam_id = $(this).attr('data-exam');
            var class_id = $(this).attr('data-class');
            var id = $(this).attr('data-schedule');

            var class_work = $('#class_work_' + student_id + subject_id).val();
            var home_work = $('#home_work_' + student_id + subject_id).val();
            var test_work = $('#test_work_' + student_id + subject_id).val();
            var exam_work = $('#exam_work_' + student_id + subject_id).val();





            $.ajax({
                type: "POST",
                url: "{{url('admin/examinations/single_submit_marks_register')}}",
                data: {
                    "_token": "{{csrf_token()}}",
                    id: id,
                    student_id: student_id,
                    subject_id: subject_id,
                    exam_id: exam_id,
                    class_id: class_id,
                    class_work: class_work,
                    home_work: home_work,
                    test_work: test_work,
                    exam_work: exam_work,




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