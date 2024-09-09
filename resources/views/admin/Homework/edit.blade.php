<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ !empty($header_title) ? $header_title : '' }} - School</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="/../../plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/../../dist/css/adminlte.min.css">
      <!-- Summernote -->
      <link rel="stylesheet" href="/../../plugins/summernote/summernote-bs4.min.css">
      <link rel="stylesheet" href="{{ url('../../plugins/select2/css/select2.min.css')}}">
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
                        <h1>Edit Homework</h1>
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
                           <form method="post" action="" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="card-body">
                                 <div class="form-group">
                                     <label>Class <span style="color:red">*</span></label>
                                     <select class="form-control" id= "getClass" name="class_id" required>
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option {{($getRecord->class_id ==$class->id) ? 'selected':''}}
                                        value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                     </select>
                                 </div>
                                  
                                 <div class="form-group">
                                     <label>Subject  <span style="color:red">*</span></label>
                                     <select class="form-control" name="subject_id" id="getSubject" required>
                                        <option value="">Select Subject</option>
                                        @foreach($getSubject as $subject)
                                        <option {{($getRecord->subject_id ==$subject->subject_id) ? 'selected':''}}
                                        value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                        @endforeach
                                     </select>
                                 </div>

                                 <div class="form-group">
                                    <label>Homework Date  <span style="color:red">*</span></label>
                                    <input type="date" value="{{$getRecord->homework_date}}" class="form-control" name="homework_date" required>
                                  </div>

                                  <div class="form-group">
                                    <label>Submission Date  <span style="color:red">*</span></label>
                                    <input type="date" value="{{$getRecord->submission_date}}" class="form-control" name="submission_date" required>
                                  </div>

                                  <div class="form-group">
                                    <label>Document </label>
                                    <input type="file" class="form-control" name="document_file">
                                                    @if(!empty($getRecord->getDocument()))
                                                    <a href="{{$getRecord->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                                    @endif
                                  </div>

                                 
                                 <div class="form-group">
                                    <label>Description  <span style="color:red">*</span></label>
                                    <textarea id="compose-textarea"  name="description" class="form-control" style="height: 300px">
                                    {{$getRecord->description}}</textarea>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                           </form>
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
      <!-- jQuery -->
      <script src="/../../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
      <!-- Summernote -->
      <script src="{{ url('../../plugins/select2/js/select2.full.min.js')}}"></script>
      <!-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> -->
      <script src="{{url('../../plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- Page specific script -->
      <script type="text/javascript">
         $(function () {
           
         
           $('#compose-textarea').summernote({height:200});
           $('#getClass').change(function(){
            var class_id=$(this).val();
            $.ajax({
                type: "POST",
                url: "{{url('admin/ajax_get_subject')}}",
                data: {
                    "_token": "{{csrf_token()}}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function (data) {
                          $('#getSubject').html(data.success);
                }
            });
           });
         });
      </script>
   </body>
</html>