<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
   </ul>
   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-comments"></i>
         <span class="badge badge-danger navbar-badge">3</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
               <!-- Message Start -->
               <div class="media">
                  <img src="/../../dist/img/user1-128x128.jpg" alt="User Avatar"
                     class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                     <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                     </h3>
                     <p class="text-sm">Call me whenever you can...</p>
                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
               </div>
               <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
               <!-- Message Start -->
               <div class="media">
                  <img src="/../../dist/img/user8-128x128.jpg" alt="User Avatar"
                     class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                     <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                     </h3>
                     <p class="text-sm">I got your message bro</p>
                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
               </div>
               <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
               <!-- Message Start -->
               <div class="media">
                  <img src="/../../dist/img/user3-128x128.jpg" alt="User Avatar"
                     class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                     <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                     </h3>
                     <p class="text-sm">The subject goes here</p>
                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
               </div>
               <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
         </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge">15</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
         </div>
</li>
   </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link" style="text-align: center;">
   <span class="brand-text font-weight-light" style="
      font-size: 23px;
      font-weight: bold!important;
      ">SCHOOL</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="/../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
         </div>
</div>
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(Auth::user()->user_type == 1)
            <li class="nav-item menu-open">
               <a href="{{url('admin/dashboard')}}" class="nav-link @if (Request::segment(2) == 'dashboard') active
                  @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                     <!-- <i class="right fas fa-angle-left"></i> -->
                  </p>
               </a>
               <!-- <ul class="nav nav-treeview"> -->
            <li class="nav-item">
               <a href="{{url('admin/admin/list')}}" class="nav-link  @if (Request::segment(2) == 'admin') active 
                  @endif">
                  <i class="fas fa-user-shield nav-icon"></i>

                  <p>Admin</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('admin/teacher/list')}}" class="nav-link  @if (Request::segment(2) == 'teacher') active 
                  @endif">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>

                  <p>Teacher</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('admin/student/list')}}" class="nav-link  @if (Request::segment(2) == 'student') active 
                  @endif">
                  <i class="fas fa-user-graduate nav-icon"></i>

                  <p>Student</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('admin/parent/list')}}" class="nav-link  @if (Request::segment(2) == 'parent') active 
                  @endif">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Parent</p>
               </a>
            </li>
            <li
               class="nav-item
               @if (Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher')
               menu-is-opening menu-open active @endif">
               <a href="#"
                  class="nav-link @if (Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher') active @endif">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                     Academics
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/class/list')}}"
                        class="nav-link @if (Request::segment(2) == 'class') active @endif">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Class</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/subject/list')}}"
                        class="nav-link @if (Request::segment(2) == 'subject') active @endif">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Unit</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/assign_subject/list')}}"
                        class="nav-link @if (Request::segment(2) == 'assign_subject') active @endif">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Assign Unit</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/class_timetable/list')}}"
                        class="nav-link @if (Request::segment(2) == 'class_timetable') active @endif">
                        <i class="fas fa-circle nav-icon"></i> 
                        <p>Class Timetable</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/assign_class_teacher/list')}}"
                        class="nav-link @if (Request::segment(2) == 'assign_class_teacher') active @endif">
                        <i class="fas fa-circle nav-icon"></i> 
                        <p>Assign Class</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li
               class="nav-item @if (Request::segment(2) == 'fees_collection')  menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'fees_collection') active @endif">
               <i class="nav-icon fas fa-university"></i>
                  <p>
                     Fees Collection
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/fees_collection/collect_fees')}}"
                        class="nav-link @if (Request::segment(3) == 'collect_fees') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Collect Fees</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/fees/collect_fees_report')}}"
                        class="nav-link @if (Request::segment(3) == 'collect_fees_report') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fees Report</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li
               class="nav-item @if (Request::segment(2) == 'communicate')  menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'communicate') active @endif">
               <i class="nav-icon fas fa-comments"></i> 
                  <p>
                     Communicate
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/communicate/send_email')}}"
                        class="nav-link @if (Request::segment(3) == 'send_email') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Send Email</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/communicate/show-sms')}}"
                        class="nav-link @if (Request::segment(3) == 'show-sms') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Send SMS</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li
               class="nav-item
               @if (Request::segment(2) == 'examinations')
               menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'examinations') active @endif">
               <i class="nav-icon fas fa-clipboard-list"></i>

                  <p>
                     Examinations
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/examinations/exam/list')}}"
                        class="nav-link @if (Request::segment(3) == 'exam') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/examinations/exam_schedule/list')}}"
                        class="nav-link @if (Request::segment(3) == 'exam_schedule') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Schedule</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/examinations/marksregister')}}"
                        class="nav-link @if (Request::segment(3) == 'marksregister') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Register</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('/admin/examinations/marks_grade_list')}}"
                        class="nav-link @if (Request::segment(3) == 'marksgrade') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Grade</p>
                     </a>
                  </li>
               </ul>
            </li>
           
            <li
               class="nav-item
               @if (Request::segment(2) == 'attendance')
               menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'attendance') active @endif">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                     Attendance
                     <i class=" fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/attendance/student')}}"
                        class="nav-link @if (Request::segment(3) == 'student') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Attendance</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="{{url('admin/attendance/report')}}"
                        class="nav-link @if (Request::segment(3) == 'report') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Attendance Report</p>
                     </a>
                  </li>

               </ul>
            </li>
             
         
            <li
               class="nav-item
               @if (Request::segment(2) == 'homework')
               menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'homework') active @endif">
                  <!-- <i class="nav-icon fas fa-table"></i> -->
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                     Homework
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/homework/homework')}}"
                        class="nav-link @if (Request::segment(3) == 'homework') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Homework</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{url('admin/my_account')}}" class="nav-link  @if (Request::segment(2) == 'my_account') active 
                  @endif">
                  <i class="fas fa-user-circle nav-icon"></i>

                  <p>My Account</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('admin/change_password')}}" class="nav-link  @if (Request::segment(2) == 'change_password') active 
                  @endif">
                  <i class="fas fa-shield-alt nav-icon"></i>

                  <p>Change Password</p>
               </a>
            </li>
            @elseif(Auth::user()->user_type == 2)
            <li class="nav-item">
               <a href="{{url('teacher/dashboard')}}" class="nav-link    @if (Request::segment(2) == 'dashboard') active
                  @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('teacher/mystudent')}}" class="nav-link    @if (Request::segment(2) == 'MyStudent') active
                  @endif">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Student </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('teacher/my_class_subject')}}" class="nav-link    @if (Request::segment(2) == 'my_class_subject') active
                  @endif">
                  <td>          <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Class & Subject </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('teacher/my_exam_timetable')}}"
                  class="nav-link @if (Request::segment(2) == 'my_exam_timetable') active @endif">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Exam Timetable</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('teacher/marksregister')}}"
                  class="nav-link @if (Request::segment(2) == 'marksregister') active @endif">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Marks Register</p>
               </a>
            </li>

            <li
               class="nav-item
               @if (Request::segment(2) == 'homework')
               menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'homework') active @endif">
                  <!-- <i class="nav-icon fas fa-table"></i> -->
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                     Homework
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('teacher/homework/homework')}}"
                        class="nav-link @if (Request::segment(3) == 'homework') active @endif">
                        
                        <i class="far fa-circle nav-icon"></i>
                        <p>Homework</p>
                     </a>
                  </li>
               </ul>
            </li>

            <li
               class="nav-item
               @if (Request::segment(2) == 'attendance')
               menu-is-opening menu-open active @endif">
               <a href="#" class="nav-link @if (Request::segment(2) == 'attendance') active @endif">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                     Attendance
                     <i class=" fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('teachers/attendance/student')}}"
                        class="nav-link @if (Request::segment(3) == 'student') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Attendance</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="{{url('teachers/attendance/report')}}"
                        class="nav-link @if (Request::segment(3) == 'report') active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Attendance Report</p>
                     </a>
                  </li>

               </ul>
            </li>

            <li class="nav-item">
               <a href="{{url('teacher/my_account')}}" class="nav-link  @if (Request::segment(2) == 'my_account') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Account</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('teacher/change_password')}}" class="nav-link  @if (Request::segment(2) == 'change_password') active 
                  @endif">
                  <i class="fas fa-shield-alt nav-icon"></i>
                  <p>Change Password</p>
               </a>
            </li>
            @elseif(Auth::user()->user_type == 3)
            <li class="nav-item">
               <a href="{{url('student/dashboard')}}" class="nav-link   @if (Request::segment(2) == 'dashboard') active
                  @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/fees_collection')}}"
                  class="nav-link @if (Request::segment(2) == 'fees_collection') active @endif">
                  <i class="fas fa-university nav-icon"></i>
                  <p>Pay Fees</p>
               </a>
            </li>
            <!-- <li class="nav-item">
               <a href="{{url('student/my_calendar')}}" class="nav-link  @if (Request::segment(2) == 'my_calendar') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Calendar</p>
               </a>
            </li> -->
            <li class="nav-item">
               <a href="{{url('student/my_subject')}}" class="nav-link  @if (Request::segment(2) == 'my_subject') active 
                  @endif">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Unit</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_timetable')}}" class="nav-link  @if (Request::segment(2) == 'my_timetable') active 
                  @endif">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Timetable</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_exam_timetable')}}"
                  class="nav-link @if (Request::segment(2) == 'my_exam_timetable') active @endif">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Exam Timetable</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_exam_result')}}"
                  class="nav-link @if (Request::segment(2) == 'my_exam_result') active @endif">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Exam Result</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_homework')}}"
                  class="nav-link @if (Request::segment(2) == 'my_homework') active @endif">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Homework</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_submitted_homework')}}"
                  class="nav-link @if (Request::segment(2) == 'my_submitted_homework') active @endif">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Submitted Homework</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/my_account')}}" class="nav-link  @if (Request::segment(2) == 'my_account') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Account</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('student/change_password')}}" class="nav-link  @if (Request::segment(2) == 'change_password') active 
                  @endif">
                  <i class="fas fa-shield-alt nav-icon"></i>
                  <p>Change Password</p>
               </a>
            </li>
            @elseif(Auth::user()->user_type == 4)
            <li class="nav-item">
               <a href="{{url('parent/dashboard')}}" class="nav-link  @if (Request::segment(2) == 'dashboard') active
                  @endif">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('parent/my_student')}}" class="nav-link  @if (Request::segment(2) == 'my_student') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Student</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('parent/my_account')}}" class="nav-link  @if (Request::segment(2) == 'my_account') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Account</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{url('parent/change_password')}}" class="nav-link  @if (Request::segment(2) == 'change_password') active 
                  @endif">
                  <i class="far fa-user nav-icon"></i>
                  <p>Change Password</p>
               </a>
            </li>
            @endif
            <li class="nav-item">
               <a href="{{url('logout')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                     Logout
                  </p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>