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
                    <div class="row mb-2 ">
                        <div class="col-sm-6">
                            <h1>My Exam Result({{$getStudent->name}} {{$getStudent->last_name}})</h1>
                        </div>
                    </div>
                    @include('_message')
                </div>
                <!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($getRecord as $value)
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$value['exam_name']}}</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body p-0" style="overflow:auto;">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>SubjectName</th>
                                                                        <th>ClassWork</th>
                                                                        <th>TestWork</th>
                                                                        <th>HomeWork</th>
                                                                        <th>ExamWork</th>
                                                                        <th>TotalScore</th>
                                                                        <th>PassingMarks</th>
                                                                        <th>FullMarks</th>
                                                                        <th>Result</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total_score = 0;
                                                                        $full_marks=0;
                                                                        $result_validation = 0;
                                                                    @endphp
                                                                    @foreach ($value['subject'] as $exam)
                                                                                                            @php
                                                                                                                $total_score = $total_score + $exam['total_score'];
                                                                                                                $full_marks = $full_marks + $exam['full_marks'];
                                                                                                            @endphp
                                                                                                            <tr>
                                                                                                                <td style="width:300px">{{$exam['subject_name']}}</td>
                                                                                                                <td>{{$exam['class_work']}}</td>
                                                                                                                <td>{{$exam['test_work']}}</td>
                                                                                                                <td>{{$exam['home_work']}}</td>
                                                                                                                <td>{{$exam['exam_work']}}</td>
                                                                                                                <td>{{$exam['total_score']}}</td>
                                                                                                                <td>{{$exam['passing_mark']}}</td>
                                                                                                                <td>{{$exam['full_marks']}}</td>

                                                                                                                <td>
                                                                                                                    @if ($exam['total_score'] >= $exam['passing_mark'])
                                                                                                                        <span style="color:green; font-weight:bold;">Pass</span>
                                                                                                                    @else
                                                                                                                    @php
                                                                                                                                                                    $result_validation = 1
                                                                                                                                                                @endphp
                                                                                                                        <span style="color:red; font-weight:bold;">Fail</span>
                                                                                                                    @endif
                                                                                                                </td>
                                                                                                            </tr>
                                                                    @endforeach

                                                                    <tr><td colspan="2"><b>GrandTotal:{{$total_score}}/{{$full_marks}}</b>

                                                                    </td>
                                                                    <td colspan="2">
                                                                    @php
                                                                                $Percentage = ($total_score * 100) / $full_marks;
                                                                                $getGrade = App\Models\MarksGradeModel::getGrade($Percentage);
                                                                            @endphp
                                                                            <b>Percentage:{{round($Percentage, 2)}}</b>

                                                                        </td>
                                                                        <td colspan="2"><b>Grade:{{$getGrade}}</b>

</td>
                                                                        <td colspan="5">
                                                                            <b>Result:
                                                                            @if ($result_validation==0)
                                                                            <span style="color:green;">Pass</span>
                                                                            @else
                                                                            <span style="color:red;">Fail</span>
                                                                            @endif
                                                                        </b>

                                                                        </td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="/../../plugins/jquery/jquery.min.js"></script>
    <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/../../dist/js/adminlte.min.js"></script>
</body>

</html>