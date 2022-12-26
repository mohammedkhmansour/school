<?php

use App\Http\Controllers\Teachers\dashboard\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();

        return view('pages.Teachers.dashboard.dashboard',$data);
    });

        //==============================students============================
     Route::get('student',[StudentController::class,'index'])->name('student.index');
     Route::get('sections',[StudentController::class,'sections'])->name('sections');
     Route::post('attendance',[StudentController::class,'attendance'])->name('attendance');
    //  Route::post('edit_attendance',[StudentController::class,'editAttendance'])->name('attendance.edit');


});
