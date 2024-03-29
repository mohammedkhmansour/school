<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
// Auth::routes();

Route::view('test','test');

// Route::group(['middleware' => ['guest']], function () {

//     Route::get('/', function () {
//         return view('auth.login');
//     });

// });
Route::get('/', [HomeController::class,'index'])->name('selection');


    Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');

    Route::post('/login',[LoginController::class,'login'])->name('login');

    Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');



        Route::resource('Grades',GradeController::class);
        Route::resource('Classrooms',ClassroomController::class);

        Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');

        Route::post('Filter_Classes', [ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');


        Route::resource('Sections',SectionController::class);

        Route::get('/classes/{id}', [SectionController::class,'getclasses']);

        //livewire form
        Route::view('add_parent','livewire.show_Form')->name('add_parent');

        Route::resource('Teachers',TeacherController::class);


    //==============================Students============================
        Route::resource('Students', StudentController::class);

        Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');


            //==============================Promotion Students ============================
        Route::resource('Promotion', PromotionController::class);

        Route::resource('Graduated', GraduatedController::class);

        Route::resource('Fees',FeesController::class);

        Route::resource('Fees_Invoices', FeesInvoicesController::class);

        Route::resource('receipt_students', ReceiptStudentsController::class);

        Route::resource('ProcessingFee', ProcessingFeeController::class);

        Route::resource('Payment_students', PaymentController::class);

        Route::resource('Attendance', AttendanceController::class);

            //==============================Subjects============================

        Route::resource('subjects', SubjectController::class);

    //==============================Quizzes============================

        Route::resource('Quizzes', QuizzController::class);

            //==============================questions============================
        Route::resource('questions', QuestionController::class);

           //==============================library============================

        Route::get('download_file/{filename}', [LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
        Route::resource('library', LibraryController::class);

            //==============================Setting============================
    Route::resource('settings', SettingController::class);


    });




