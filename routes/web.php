<?php

use App\Http\Controllers\announcement\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\changepassword\changepasswordcontroller;
use App\Http\Controllers\ClassSchedule\ClassScheduleController;
use App\Http\Controllers\Examdetail\ExamResultController;
use App\Http\Controllers\ExamDetail\ExamScheduleController;
use App\Http\Controllers\ExamDetail\ExamSeatController;
use App\Http\Controllers\ExamDetail\LocationController;
use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\promote\PromoteController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\StudyMaterial\CoursesyllabusController;
use App\Http\Controllers\StudyMaterial\NoteController;
use App\Http\Controllers\StudyMaterial\QuestionpaperController;
use App\Http\Controllers\User\Homepage\HomepageController as HomepageHomepageController;
use App\Models\notice;
use App\Models\studentdetail;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    $profile=notice::get();
    return view('guest.dashboard.index',compact('profile'));
})->name('auth.dashboard');

Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register_user');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login_user');


Route::get('/forgetpassword', function () {
    return view('auth.forgetpassword');
})->name('forgetpassword');

Route::group(['middleware' => "auth"], function ($router) {
    $router->get('homepage', function () {
        $studentdetailprofile=studentdetail::get();
        $profile=notice::get();
         return view('admin.homepage.index',compact('studentdetailprofile','profile'));
    })->name('homepage');
});




Route::group(['middleware' => "auth"], function ($router) {
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    Route::resource('examdetail/examschedule', ExamScheduleController::class);
    Route::post('examdetail/examschedule/display', [ExamScheduleController::class, 'display'])->name('examschedule.display');
    Route::get('Examdetail/examschedule/showschedule', [ExamScheduleController::class, 'showtabledata'])->name('examschedule.showtabledata');
    Route::get('Examdetail/examschedule/board', [ExamScheduleController::class, 'boardschedule'])->name('examschedule.boardschedule');
    Route::post('examdetail/examschedule/create', [ExamScheduleController::class, 'calculatedate'])->name('examschedule.calculatedate');

    Route::get('Examdetail/examschedule/showtabledata', [ExamScheduleController::class, 'showtabledata'])->name('examschedule.showtabledata');
    Route::post('Examdetail/examschedule/scheduledisplay', [ExamScheduleController::class, 'scheduledisplay'])->name('examschedule.scheduledisplay');
    Route::post('Examdetail/examschedule/schedulestore', [ExamScheduleController::class, 'schedulestore'])->name('examschedule.schedulestore');
    Route::post('Examdetail/examschedule/download', [ExamScheduleController::class, 'download'])->name('examschedule.download');
    Route::post('Examdetail/examschedule/deletedata', [ExamScheduleController::class, 'deletedata'])->name('examschedule.deletedata');

    Route::get('Examdetail/examschedule/boardshowtabledata', [ExamScheduleController::class, 'boardschedule'])->name('examschedule.boardschedule');
    Route::post('Examdetail/examschedule/boardscheduledisplay', [ExamScheduleController::class, 'boardscheduledisplay'])->name('examschedule.boardscheduledisplay');
    Route::post('Examdetail/examschedule/boardschedulestore', [ExamScheduleController::class, 'boardschedulestore'])->name('examschedule.boardschedulestore');
    Route::post('Examdetail/examschedule/boarddownload', [ExamScheduleController::class, 'boarddownload'])->name('examschedule.boarddownload');
    Route::post('Examdetail/examschedule/boarddeletedata', [ExamScheduleController::class, 'boarddeletedata'])->name('examschedule.boarddeletedata');
    Route::get('examdetail/examschedule/{id}/boardedit', [ExamScheduleController::class, 'boardedit'])->name('examschedule.boardedit');



    Route::resource('examdetail/examseat', ExamSeatController::class);
    Route::resource('homepagemenu', HomepageController::class);

    Route::resource('/changepassword', changepasswordcontroller::class);


    Route::get('examdetail/examresult/terminalexam', [ExamResultController::class, 'terminal'])->name('examresult.terminalexam');
    Route::post('examdetail/examresult/display', [ExamResultController::class, 'display'])->name('examresult.display');
    Route::post('examdetail/examresult/download', [ExamResultController::class, 'download'])->name('examresult.download');
    Route::post('examdetail/examresult/deletedata', [ExamResultController::class, 'deletedata'])->name('examresult.deletedata');

    Route::post('examdetail/examresult/boardstore', [ExamResultController::class, 'boardstore'])->name('examresult.boardstore');
    Route::get('examdetail/examresult/{id}/boardedit', [ExamResultController::class, 'boardedit'])->name('examresult.boardedit');
    Route::post('examdetail/examresult/boarddisplay', [ExamResultController::class, 'boarddisplay'])->name('examresult.boarddisplay');
    Route::post('examdetail/examresult/boarddownload', [ExamResultController::class, 'boarddownload'])->name('examresult.boarddownload');
    Route::post('examdetail/examresult/boarddeletedata', [ExamResultController::class, 'boarddeletedata'])->name('examresult.boarddeletedata');

    Route::get('examdetail/examresult/boardexam', [ExamResultController::class, 'board'])->name('examresult.boardexam');
    Route::resource('examdetail/examresult', ExamResultController::class);

    Route::resource('setting/promote', PromoteController::class);


    Route::resource('/Profile', ProfileController::class);

    Route::resource('/location', LocationController::class);

    Route::resource('/StudentMaterial/Note', NoteController::class);
    Route::post('StudentMaterial/Note/save', [NoteController::class, 'save'])->name('Note.save');
    Route::post('StudentMaterial/Note/display', [NoteController::class, 'display'])->name('Note.display');
    Route::post('StudentMaterial/Note/download', [NoteController::class, 'download'])->name('Note.download');
    Route::post('StudentMaterial/Note/deletedata', [NoteController::class, 'deletedata'])->name('Note.deletedata');
    Route::post('StudentMaterial/Note/displaydata', [NoteController::class, 'displaydata'])->name('Note.displaydata');



    Route::resource('/StudentMaterial/Questionpaper', QuestionpaperController::class);
    Route::post('StudentMaterial/Questionpaper/save', [QuestionpaperController::class, 'save'])->name('Questionpaper.save');
    Route::post('StudentMaterial/Questionpaper/display', [QuestionpaperController::class, 'display'])->name('Questionpaper.display');
    Route::post('StudentMaterial/Questionpaper/download', [QuestionpaperController::class, 'download'])->name('Questionpaper.download');
    Route::post('StudentMaterial/Questionpaper/deletedata', [QuestionpaperController::class, 'deletedata'])->name('Questionpaper.deletedata');

    Route::resource('/StudentMaterial/CourseSyllabus', CoursesyllabusController::class);
    Route::post('StudentMaterial/CourseSyllabus/save', [CoursesyllabusController::class, 'save'])->name('CourseSyllabus.save');
    Route::post('StudentMaterial/CourseSyllabus/display', [CoursesyllabusController::class, 'display'])->name('CourseSyllabus.display');
    Route::post('StudentMaterial/CourseSyllabus/download', [CoursesyllabusController::class, 'download'])->name('CourseSyllabus.download');
    Route::post('StudentMaterial/CourseSyllabus/deletedata', [CoursesyllabusController::class, 'deletedata'])->name('CourseSyllabus.deletedata');
    // Route::post('StudentMaterial/CourseSyllabus/displaydata', [CoursesyllabusController::class, 'displaydata'])->name('Note.displaydata');


    ///////////////////////////////////////////////////////////////////////////////
    Route::resource('/Setting', SettingController::class);
    Route::get('setting/modify', [SettingController::class, 'studentdetail'])->name('setting.modify');
    Route::Post('setting/delete', [SettingController::class, 'subjectdelete'])->name('setting.delete');
    Route::Post('setting/edit', [SettingController::class, 'updatedata'])->name('setting.updatedata');
    ////////////////////////////////////////////////////////
    Route::get('setting/update', [SettingController::class, 'studentdata'])->name('setting.update');
    Route::Post('setting/save', [SettingController::class, 'savedata'])->name('setting.savedata');
    Route::Post('setting/deletedata', [SettingController::class, 'deletedata'])->name('setting.deletedata');
    Route::get('setting/editdata/{id}', [SettingController::class, 'editdata'])->name('setting.editdata');
    Route::Post('setting/updatedetail', [SettingController::class, 'updatedetail'])->name('setting.updatedetail');




    ////////////////////////////////////////////////////////
    Route::resource('classsSchedule', ClassScheduleController::class);
    Route::get('ClasssSchedule/display', [ClassScheduleController::class, 'display'])->name('classsSchedule.display');

    // Route::get('ClasssSchedule/showtabledata', [ClassScheduleController::class, 'showtabledata'])->name('examschedule.boardschedule');
    Route::post('ClasssSchedule/scheduledisplay', [ClassScheduleController::class, 'scheduledisplay'])->name('classsSchedule.scheduledisplay');
    Route::post('ClasssSchedule/schedulestore', [ClassScheduleController::class, 'schedulestore'])->name('classsSchedule.schedulestore');
    Route::post('ClasssSchedule/download', [ClassScheduleController::class, 'download'])->name('classsSchedule.download');
    Route::post('ClasssSchedule/deletedata', [ClassScheduleController::class, 'deletedata'])->name('classsSchedule.deletedata');
    Route::get('ClasssSchedule/{id}/classedit', [ClassScheduleController::class, 'classedit'])->name('classsSchedule.classedit');


});


