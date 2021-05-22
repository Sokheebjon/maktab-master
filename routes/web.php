<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\TestTitleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('sendEmail');



Route::get('/show_event/{event}', [App\Http\Controllers\HomeController::class, 'show_event'])->name('show_event');

Route::get('/show_news/{news}', [App\Http\Controllers\HomeController::class, 'show_news'])->name('show_news');

Route::get('/all_news/{cat?}', [App\Http\Controllers\HomeController::class, 'all_news'])->name('all_news');

Route::get('/best_students/', [App\Http\Controllers\HomeController::class, 'best_students'])->name('best_students');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function (){

    Route::resources([
        '/category' => CategoryController::class,
        '/group' => GroupController::class,
        '/news' => NewsController::class,
        '/events' => EventsController::class,
        '/subject' => SubjectController::class,
        '/type' => TypeController::class
    ]);

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/teacher', [AdminController::class, 'teacher'])->name('teacher');

    Route::post('/teacher_store', [AdminController::class, 'teacher_store'])->name('teacher_store');

    Route::get('/all_teacher', [AdminController::class, 'all_teacher'])->name('all_teacher');

    Route::get('/all_students', [TeacherController::class, 'all_students'])->name('all_students');

    Route::get('/student', [AdminController::class, 'student'])->name('student');

    Route::post('/student_store', [AdminController::class, 'student_store'])->name('student_store');

    Route::get('/all_student', [AdminController::class, 'all_student'])->name('all_student');

    Route::get('/update_profile/{user}', [AdminController::class, 'update_profile'])->name('update_profile');

    Route::put('/change_profile/{user}', [AdminController::class, 'change_profile'])->name('change_profile');

    Route::delete('/destroy/{user}', [AdminController::class, 'destroy'])->name('destroy');

    Route::get('/group/group_user/{group}', [GroupController::class, 'group_user'])->name('group.group_user');

    Route::get('/group/group_subject/{group}', [GroupController::class, 'group_subject'])->name('group.group_subject');

    Route::get('/group/group_timetable/{group}', [GroupController::class, 'group_timetable'])->name('group.group_timetable');

    Route::post('/group/group_user_store/{group}', [GroupController::class, 'group_user_store'])->name('group.group_user_store');

    Route::post('/group/timetable_store/', [GroupController::class, 'timetable_store'])->name('group.timetable_store');

    Route::post('/group/group_subject_store/', [GroupController::class, 'group_subject_store'])->name('group.group_subject_store');

    Route::get('/group/bulk_insert/{group}', [GroupController::class, 'bulk_insert'])->name('group.bulk_insert');
});

Route::middleware(['teacher'])->prefix( 'teacher/')->name('teacher.')->group(function (){

    Route::resources([
        '/test-title' => TestTitleController::class,
    ]);

    Route::get('/', [TeacherController::class, 'index'])->name('index');

    Route::get('/lang/{locale}', [TeacherController::class, 'lang'])->name('lang');

    Route::get('/all_student/{group_id?}', [TeacherController::class, 'all_student'])->name('all_student');

    Route::get('/teacher_group', [TeacherController::class, 'teacher_group'])->name('teacher_group');

    Route::get('/marked/{group}', [TeacherController::class, 'marked'])->name('marked');

    Route::post('/marked_store_update/{group}', [TeacherController::class, 'marked_store_update'])->name('marked_store_update');

    Route::get('/teacher_timetable', [TeacherController::class, 'teacher_timetable'])->name('teacher_timetable');

    Route::get('/teacher_timetable_excel', [TeacherController::class, 'teacher_timetable_excel'])->name('teacher_timetable_excel');

    Route::get('/teacher_timetable_pdf', [TeacherController::class, 'teacher_timetable_pdf'])->name('teacher_timetable_pdf');

    Route::get('/remove_question', [TestTitleController::class, 'remove_question'])->name('remove_question');

    Route::get('/remove_answer', [TestTitleController::class, 'remove_answer'])->name('remove_answer');
});
