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
                     <h1>Attendance Report(Total:{{$getRecord->total()}})</h1>
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
                              Search Attendance Report
                           </h3>
                        </div>
                        <form method="get" action="">
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-md-2">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" placeholder="Student ID" value="{{Request::get('student_name')}}" name="student_name">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Student Last Name</label>
                                    <input type="text" class="form-control" placeholder="Student Last Name" value="{{Request::get('student_last_name')}}" name="student_last_name">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" >
                                       <option value="">Select</option>
                                       @foreach ($getClass as $class)
                                       <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                       value="{{$class->id}}">{{$class->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Date</label>
                                    <input type="date" class="form-control" value="{{Request::get('attendance_date')}}" name="attendance_date">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Attendance Type</label>
                                    <select class="form-control" name="attendance_type">
                                       <option value="">Select</option>
                                       <option {{(Request::get('attendance_type') == 1) ? 'selected' : ''}} value="1">Present</option>
                                       <option {{(Request::get('attendance_type') == 2) ? 'selected' : ''}} value="2">Late</option>
                                       <option {{(Request::get('attendance_type') == 3) ? 'selected' : ''}} value="3">Absent</option>
                                       <option {{(Request::get('attendance_type') == 4) ? 'selected' : ''}} value="4">Half Day</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-2">
                                    <button class="btn btn-primary"
                                       style="margin-top: 31px;">Search</button>
                                    <a href="{{url('admin/attendance/report')}}"
                                       class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                        </form>
                     </div>
                     <div class="card" style="overflow:auto;">
                        <div class="card-header">
                           <h3 class="card-title">Attendance List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="overflow:auto;">
                           <table class="table table-stripped">
                              <thead>
                                 <tr>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Class Name</th>
                                    <th>Student Attendance</th>
                                    <th>Attendance Date</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @forelse($getRecord as $value)
                                 <tr>
                                    <td>{{$value->student_id}}</td>
                                    <td>{{$value->student_name}}{{$value->student_last_name}}</td>
                                    <td>{{$value->class_name}}</td>
                                    <td>
                                       @if($value->attendance_type==1)
                                       Present
                                       @elseif($value->attendance_type==2)
                                       Late
                                       @elseif($value->attendance_type==2)
                                       Absent
                                       @elseif($value->attendance_type==2)
                                       Halfday
                                       @endif
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($value->attendance_date))}}</td>
                                    <td>{{$value->created_name}}</td>
                                    <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                 </tr>
                                 @empty
                                 <tr>
                                    <td colspan="100%">Record not found</td>
                                 </tr>
                                 @endforelse
                              </tbody>
                           </table>
                           <div style="padding:10px; float: right;">
                              {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                           </div>
                        </div>
                     </div>
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