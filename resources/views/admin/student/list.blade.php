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
                            <h1>Student List(Total:{{$getRecord->total()}})</h1>
                        </div>

                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/student/add')}}" class="btn btn-primary">Add New Student</a>
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
                                    <h3 class="card-title">Search Student
                                </div>
                                <form method="get" action="">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="{{Request::get('name')}}"
                                                    name="name" placeholder="Name">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" value="{{Request::get('last_name')}}"
                                                    name="last_name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="{{Request::get('email')}}"
                                                    name="email" placeholder="Name">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Admission No</label>
                                                <input type="text" class="form-control" value="{{Request::get('admission_no')}}"
                                                    name="admission_no" placeholder="Admission Number">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Roll Number</label>
                                                <input type="text" class="form-control" value="{{Request::get('	roll_number')}}"
                                                    name="	roll_number" placeholder="Roll Number">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Class</label>
                                                <input type="text" class="form-control" value="{{Request::get('class')}}"
                                                    name="class" placeholder="Class">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Gender</label>
                                                <select class="form-control" name="status">
                                                   <option value="">Select Gender</option>
                                                    <option {{(Request::get('gender')=='Male') ?'selected':''}} value="Male">Male</option>
                                                    <option  {{(Request::get('gender')=='Female') ?'selected':''}} value="Female">Female</option>
                                                    <option  {{(Request::get('gender')=='Other') ?'selected':''}} value="Other">Other</option>

                                                </select>
                                               
                                            </div>

                                            

                                            <div class="form-group col-md-2">
                                                <label>Caste</label>
                                                <input type="text" class="form-control" value="{{Request::get('caste')}}"
                                                    name="caste" placeholder="Caste">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Religion</label>
                                                <input type="text" class="form-control" value="{{Request::get('religion')}}"
                                                    name="religion" placeholder="Religion">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="{{Request::get('mobile_number')}}"
                                                    name="mobile_number" placeholder="Mobile Number">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Admission Date</label>
                                                <input type="text" class="form-control" value="{{Request::get('admission_date')}}"
                                                    name="admission_date" placeholder="Admission Date">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Blood Group</label>
                                                <input type="text" class="form-control" value="{{Request::get('blood_group')}}"
                                                    name="blood_group" placeholder="Blood Group">
                                            </div>

                                            

                                            <div class="form-group col-md-2">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                   <option value="">Status</option>
                                                    <option {{(Request::get('status')==100) ?'selected':''}} value="100">Active</option>
                                                    <option  {{(Request::get('status')==1) ?'selected':''}} value="1">Inactive</option>
                                                </select>
                                               
                                            </div>

                                        
                                           
                                            <div class="form-group col-md-3">
                                                <label>Date</label>
                                                <input type="Date" class="form-control"
                                                    value="{{Request::get('date')}}" name="date" placeholder="Date">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>

                                                <a href="{{url('admin/admin/list')}}" class="btn btn-success"
                                                    style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>




                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Student List</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile Pic</th>
                                                <th>Student Name</th>
                                                <th>Parent Name</th>
                                                <th>Email</th>
                                                <th>Admission Number</th>
                                                <th>Roll Number</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>Caste</th>
                                                <th>Religion</th>
                                                <th>Mobile Number</th>
                                                <th>Admission Date</th>
                                                <th>Blood Group</th>
                                                <th>Height</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id}}</td>
                                                    <td>
                                                        @if(!empty($value->getProfile()))
                                                            <img src="{{$value->getProfile()}}"
                                                                style="height:50px;width:50px; border-radius:50px;">
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->name}} {{$value->last_name}}</td>
                                                    <td>{{ $value->parent_name}} {{$value->parent_last_name}}</td>
                                                    <td>{{ $value->email}}</td>
                                                    <td>{{ $value->admission_no}}</td>
                                                    <td>{{ $value->roll_number}}</td>
                                                    <td>{{ $value->class_name}}</td>
                                                    <td>{{ $value->gender}}</td>
                                                    <td>
                                                        @if (!empty($value->date_of_birth))
                                                            {{date('d-m-Y', strtotime($value->date_of_birth))}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->caste}}</td>
                                                    <td>{{ $value->religion}}</td>
                                                    <td>{{ $value->mobile_number}}</td>
                                                   
                                                    <td>
                                                        @if (!empty($value->admission_date))
                                                            {{date('d-m-Y', strtotime($value->admission_date))}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->blood_group}}</td>
                                                    <td>{{ $value->height}}</td>
                                                    <td>{{ $value->weight}}</td>
                                                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive'}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                                    <td style="min-width: 150px;">
                                                        <a href="{{url('admin/student/' . $value->id)}}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="{{url('admin/student/delete/' . $value->id)}}"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div style="padding:10px; float: right;">



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
        <!-- /.content-wrapper -->


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