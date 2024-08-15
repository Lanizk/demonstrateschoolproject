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
                        <div class="col-sm-12">
                            <h1>Collect Fees</h1>
                        </div>


                    </div>
                    @include('_message')
                </div><!-- /.container-fluid -->
            </section>




            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Search Collect Fees Student
                                </div>
                                <form method="get" action="">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Class</label>
                                                <select class="form-control" name="class_id">
                                                    <option value="">Select Class</option>
                                                    @foreach($getClass as $class)
                                                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                                            value="{{$class->id}}">
                                                            {{$class->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Student ID</label>
                                                <input type="text" class="form-control"
                                                    value="{{Request::get('student_id')}}" name="student_id"
                                                    placeholder="Student ID">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Student First Name</label>
                                                <input type="text" class="form-control"
                                                    value="{{Request::get('first_name')}}" name="first_name"
                                                    placeholder="Student First Name">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Student Last Name</label>
                                                <input type="text" class="form-control"
                                                    value="{{Request::get('last_name')}}" name="last_name"
                                                    placeholder="Student Last Name">
                                            </div>


                                            <div class="form-group col-md-2">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>

                                                <a href="{{url('/admin/fees_collection/collect_fees')}}"
                                                    class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Class List</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow: scroll;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>StudentId</th>
                                                <th>StudentName</th>
                                                <th>AdmissionNumber</th>
                                                <th>ClassName</th>
                                                <th>TotalAmount</th>
                                                <th>PaidAmount</th>
                                                <th>RemainingAmount</th>
                                                <th>CreatedDate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($getRecord))
                                                                                    @forelse($getRecord as $value)
                                                                                                                            @php
                                                                                                                                $paid_amount = $value->getPaidAmount($value->id, $value->class_id);
                                                                                                                                $RemainingAmount = $value->amount - $paid_amount;
                                                                                                                            @endphp
                                                                                                                            <tr>
                                                                                                                                <td>{{$value->id}}</td>
                                                                                                                                <td>{{$value->name}}{{$value->last_name}}</td>
                                                                                                                                <td>{{$value->admission_no}}</td>
                                                                                                                                <td>{{$value->class_name}}</td>
                                                                                                                                <td>sh{{number_format($value->amount, 2)}}</td>
                                                                                                                                <td>sh{{number_format($paid_amount, 2)}}</td>
                                                                                                                                <td>sh{{number_format($RemainingAmount, 2)}}</td>
                                                                                                                                <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                                                                                                                <td>
                                                                                                                                    <a href="{{url('admin/fees_collection/collect_fees/add_fees/' . $value->id)}}"
                                                                                                                                        class="btn btn-success">Collect Fees</a>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td colspan="100%">Record not found</td>
                                                                                        </tr>
                                                                                    @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="100%">Record not found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div style="padding:10px; float: right;">
                                        @if(!empty($getRecord))
                                            {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                                        @endif

                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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

</body>

</html>