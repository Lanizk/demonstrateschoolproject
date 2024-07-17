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
                            <h1>Teacher List(Total:{{$getRecord->total()}})</h1>
                        </div>

                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/teacher/add')}}" class="btn btn-primary">Add New Teacher</a>
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
                                    <h3 class="card-title">Search Teacher
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
                                                <label>Gender</label>
                                                <select class="form-control" name="status">
                                                   <option value="">Select Gender</option>
                                                    <option {{(Request::get('gender')=='Male') ?'selected':''}} value="Male">Male</option>
                                                    <option  {{(Request::get('gender')=='Female') ?'selected':''}} value="Female">Female</option>
                                                    <option  {{(Request::get('gender')=='Other') ?'selected':''}} value="Other">Other</option>

                                                </select>
                                               
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="{{Request::get('mobile_number')}}"
                                                    name="mobile_number" placeholder="Mobile Number">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Marital Status</label>
                                                <input type="text" class="form-control" value="{{Request::get('marital_status')}}"
                                                    name="marital_status" placeholder="Marital Status">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>CurrentAddress</label>
                                                <input type="text" class="form-control" value="{{Request::get('address')}}"
                                                    name="address" placeholder="Current Address">
                                            </div>

                                            
                                            <div class="form-group col-md-2">
                                                <label>Joining Date</label>
                                                <input type="text" class="form-control" value="{{Request::get('admission_date')}}"
                                                    name="admission_date" placeholder="Joining Date">
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
                                                <label>CreatedDate</label>
                                                <input type="Date" class="form-control"
                                                    value="{{Request::get('date')}}" name="date" placeholder="CreatedDate">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 31px;">Search</button>

                                                <a href="{{url('admin/teacher/list')}}" class="btn btn-success"
                                                    style="margin-top: 31px;">Clear</a>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>




                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Teacher List</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ProfilePic</th>
                                                <th>TeacheName</th>
                                                 <th>Email</th>
                                                 <th>Gender</th>
                                                 <th>DateOfBirth</th>
                                                 <th>DateOfJoining</th>
                                                 <th>Mobile Number</th>
                                                 <th>MaritalStatus</th>
                                                 <th>CurrentAddress</th>
                                                 <th>PermanentAddress</th>
                                                 <th>Qualification</th>
                                                 <th>WorkExperience</th>
                                                 <th>Note</th>
                                                 <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
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
                                                    <td>{{ $value->email}}</td>
                                                    <td>{{ $value->gender}}</td>
                                                    <td>
                                                        @if (!empty($value->date_of_birth))
                                                            {{date('d-m-Y', strtotime($value->date_of_birth))}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($value->admission_date))
                                                            {{date('d-m-Y', strtotime($value->admission_date))}}
                                                        @endif
                                                    </td>
                                                    
                                                    <td>{{ $value->mobile_number}}</td>
                                                    <td>{{ $value->marital_status}}</td>
                                                    <td>{{ $value->address}}</td>
                                                    <td>{{ $value->permanent_address}}</td>
                                                    <td>{{ $value->qualification}}</td>
                                                    <td>{{ $value->work_experience}}</td>
                                                    <td>{{ $value->note}}</td>

                                                   
                                                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive'}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                                    <td style="min-width: 150px;">
                                                        
                                                            <a href="{{url('admin/teacher/' . $value->id)}}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="{{url('admin/teacher/delete/' . $value->id)}}"
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