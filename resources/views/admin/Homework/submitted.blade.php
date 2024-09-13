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
               <h1>  Submitted Homework</h1>
            </div>
            
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">
                     Search Homework
                  </div>
                  <form method="get" action="">
                     <div class="card-body">
                        <div class="row">
                           
                           <div class="form-group col-md-3">
                              <label>StudentFirstName</label>
                              <input type="text" class="form-control" value="{{Request::get('first_name')}}"
                                 name="first_name" placeholder="Student First Name">
                           </div>
                           
                           <div class="form-group col-md-3">
                              <label>StudentLastName</label>
                              <input type="text" class="form-control" value="{{Request::get('last_name')}}"
                                 name="last_name" placeholder="Student Last Name">
                           </div>
                           <div class="form-group col-md-3">
                              <label>From Created Date</label>
                              <input type="date" class="form-control" value="{{Request::get('from_created_date')}}"
                                 name="from_created_date">
                           </div>
                         
                           <div class="form-group col-md-3">
                              <label>To Created Date</label>
                              <input type="date" class="form-control" value="{{Request::get('to_created_date')}}"
                                 name="to_created_date">
                           </div>
                         

                           <div class="form-group col-md-3">
                              <button class="btn btn-primary"
                                 style="margin-top: 31px;">Search</button>
                              <a href="{{url('admin/homework/homework/submitted/'.$homework_id)}}" class="btn btn-success"
                                 style="margin-top: 31px;">Clear</a>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                  </form>
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
   </div>
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">Homework List</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0" style="overflow:auto;">
   <table class="table">
   <thead>
   <tr>
   <th>#</th>
   <th>StudentName</th>
   <th>Description</th>
   <th>Document</th>
   <th>CreatedAt</th>
   
   </tr>
   </thead>
   <tbody>
   @forelse($getRecord as $value)
   <tr>
   <td>{{$value->id}}</td>
   <td>{{$value->first_name}} {{$value->last_name}}</td>
   <td>{{$value->description}}</td>
   <td>
   @if(!empty($value->getDocument()))
   <a href="{{$value->getDocument() }}" class="btn btn-primary" download="">Download</a>
   @endif
   </td>
   <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
   
   </tr>
   @empty
   <tr>
   <td colspan="100%">Record not found</td>
   </tr>
   @endforelse
   </tbody>
   </table>
   <div style="padding:10px; float: right;">
   {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!} </div>
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
   <script src="/../../plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="/../../dist/js/adminlte.min.js"></script>
</body>
</html>