
 <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ !empty($header_title) ? $header_title : '' }} - School Management System</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="/../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/../../dist/css/adminlte.min.css">
      
      <!-- Summernote -->
      <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
      <!-- Select2 -->
      <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css')}}">
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
      @include('layout.header')
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Send SMS</h1>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <!-- left column -->
                     <div class="col-md-12">
                        @include('_message')
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <form method="post" action="/send-sms">
                              {{ csrf_field() }}
                              <div class="card-body">
                                 
                                 <div class="form-group">
                                    <label>User (Student/Parent/Teacher)</label>
                                    <select name="user_id" class="form-control select2" style="width: 100%;">
                                       <option value="">Select Individual User</option>
                                       <!-- Populate with users if needed -->
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label style="display:block;">Message To </label>
                                    <label style="margin-right: 50px"><input type="checkbox" value="3" name="message_to[]"> Student</label>
                                    <label style="margin-right: 50px"><input type="checkbox" value="4" name="message_to[]"> Parent</label>
                                    <label><input type="checkbox" value="2" name="message_to[]"> Teacher</label>
                                 </div>

                                 <div class="form-group">
                                    <label>Message</label>
                                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 200px" required></textarea>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Send SMS</button>
                              </div>
                           </form>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!--/.col (left) -->
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
      <script src="/../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/../../dist/js/adminlte.min.js"></script>

      
      <!-- Select2 -->
      <script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
      <!-- Summernote -->
      <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
      <!-- Page specific script -->
      <script type="text/javascript">
         $(function () {
           // Initialize Select2 for user selection
           $('.select2').select2({
               ajax:{
                   url: '{{ url('admin/communicate/search_user') }}',
                   dataType: 'json',
                   delay: 250,
                   data: function(data) {
                       return {
                           search: data.term,
                       };
                   },
                   processResults: function(response) {
                       return {
                           results: response
                       };
                   },
               }
           });
         
           // Initialize Summernote for message composition
           $('#compose-textarea').summernote({
               height: 200
           });
         });
      </script>
   </body>
</html>
