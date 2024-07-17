<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);


// Route::get('/admin/test', function () {
//     return view('email.test');
// });

Route::get('/admin/admin/list', function () {
    return view('admin.admin/list');
});



Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/admin/admin/list', [AdminController::class, 'list']);
    Route::get('/admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'Insert']);
    Route::get('admin/test/{id}', [AdminController::class, 'test']);
    Route::post('admin/test/{id}', [AdminController::class, 'update']);
    Route::get('admin/test/delete/{id}', [AdminController::class, 'delete']);

    Route::get('/admin/my_account', [UserController::class, 'myAccount']);
    Route::post('/admin/my_account', [UserController::class, 'UpdateMyAccountAdmin']);


    //Teacher
    Route::get('/admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('/admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'Insert']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);
    Route::get('admin/teacher/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/{id}', [TeacherController::class, 'update']);


    //student url
    Route::get('/admin/student/list', [StudentController::class, 'list']);
    Route::get('/admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'Insert']);
    Route::get('admin/student/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    //Parent
    Route::get('/admin/parent/list', [ParentController::class, 'list']);
    Route::get('/admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'Insert']);
    Route::get('admin/parent/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    //Route::get('admin/parent/mwanafunzi/{id}', [ParentController::class, 'mwanafunzi']);
    Route::get('admin/mwana/{id}', [ParentController::class, 'mwana']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);


    //Class Timetable
    Route::get('/admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('/admin/class_timetable/get_subject', [ClassTimetableController::class, 'getSubject']);
    Route::post('/admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);





    //class url
    Route::get('/admin/class/list', [ClassController::class, 'list']);
    Route::get('/admin/class/add', [ClassController::class, 'add']);
    Route::post('/admin/class/add', [ClassController::class, 'insert']);
    Route::post('admin/consent/{id}', [ClassController::class, 'update']);
    Route::get('admin/consent/delete/{id}', [ClassController::class, 'delete']);
    Route::get('admin/consent/{id}', [ClassController::class, 'consent']);

    //Subject url
    Route::get('/admin/subject/list', [SubjectController::class, 'list']);
    Route::get('/admin/subject/add', [SubjectController::class, 'add']);
    Route::post('/admin/subject/add', [SubjectController::class, 'insert']);
    Route::post('admin/subject/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);
    Route::get('admin/subject/{id}', [SubjectController::class, 'consent']);


    //Assign Subject url
    Route::get('/admin/assign_subject/list', [classSubjectController::class, 'list']);
    Route::get('/admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('/admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::post('admin/assign_subject/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::get('admin/assign_subject/{id}', [ClassSubjectController::class, 'consent']);
    Route::post('admin/single/{id}', [ClassSubjectController::class, 'update_single']);
    Route::get('admin/single/{id}', [ClassSubjectController::class, 'single']);

    //Change password
    Route::get('/admin/change_password', [UserController::class, 'change_password']);
    Route::post('/admin/change_password', [UserController::class, 'update_change_password']);

    //Assign class teacher url
    Route::get('/admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('/admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('/admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('/admin/assign_class_teacher/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('/admin/assign_class_teacher/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('/admin/editalone/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('/admin/editalone/{id}', [AssignClassTeacherController::class, 'update_single']);
    Route::get('/admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);
    // Route::post('/admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);




});

Route::group(['middleware' => 'teacher'], function () {

    Route::get('/teacher/dashboard', [DashboardController::class, 'dashboard']);

    //Change password
    Route::get('/teacher/change_password', [UserController::class, 'change_password']);
    Route::post('/teacherchange_password', [UserController::class, 'update_change_password']);

    Route::get('/teacher/my_account', [UserController::class, 'myAccount']);
    Route::post('/teacher/my_account', [UserController::class, 'UpdateMyAccount']);

    //My Student
    Route::get('/teacher/mystudent', [StudentController::class, 'MyStudent']);

    //My Class  Subject
    Route::get('/teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);

});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);

    //Change password
    Route::get('/student/change_password', [UserController::class, 'change_password']);
    Route::post('/student/change_password', [UserController::class, 'update_change_password']);

    Route::get('/student/my_subject', [SubjectController::class, 'MySubject']);

    //Edit Profile
    Route::get('/student/my_account', [UserController::class, 'myAccount']);
    Route::post('/student/my_account', [UserController::class, 'UpdateMyAccountStudent']);

});

Route::group(['middleware' => 'parent'], function () {
    Route::get('/parent/dashboard', [DashboardController::class, 'dashboard']);

    //Change password
    Route::get('/parent/change_password', [UserController::class, 'change_password']);
    Route::post('/parent/change_password', [UserController::class, 'update_change_password']);

    Route::get('/parent/my_account', [UserController::class, 'myAccount']);
    Route::post('/parent/my_account', [UserController::class, 'UpdateMyAccountParent']);

    Route::get('/parent/my_student', [ParentController::class, 'myStudentParent']);
    Route::post('/parent/my_account', [ParentController::class, 'UpdateMyAccountParent']);


    Route::get('/parent/my_student/somo/{student_id}', [SubjectController::class, 'ParentStudentSubject']);

    Route::get('parent/studentmy/soma/{student_id}', [SubjectController::class, 'ParentStudentSubject']);

});


