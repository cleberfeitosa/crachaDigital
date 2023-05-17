<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Guard;
use App\Models\ReleaseHistory;
use App\Models\ReleaseType;
use App\Models\Student;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("/teste", function (Request $request) {
//     // $response = CourseType::create(['course_type' => 'Tecnólogo']);
//     // var_dump($response->id);

//     // $response = Course::create([
//     //     'course_name' => 'ADS', 
//     //     'course_code' => '1001', 
//     //     'course_type' => '99287338-e541-43f5-b598-264ee380fe16'
//     // ]);
//     // var_dump($response->course_name);

//     $course = Course::all();
//     var_dump($course[0]);
//     // return "a";
// });


/* Route::get('/teste', function (Request $request){
    $response = Guard::create([
        'guard_name' => 'Pedro Tosta',
        'registration' => '20131104',
        'password' => '123456'
    ]);
    var_dump($response->guard_name);

    $guard = Guard::all();
    var_dump($guard[0]);

    return "Fim";
}); */


Route::get('/teste', function (Request $request){
    $response = ReleaseType::create([
        'release_type' => 'Prova'
    ]);
    var_dump($response->id);

    $response = Student::create([
        'student_name' => 'Pedro Tosta',
        'registration' => '20131104',
        'password' => '1234',
        'class' => '5d1c5a57-1aa2-48b8-bc61-d803ded65b96'
    ]);
    var_dump($response->id);

    $response = Guard::create([
        'guard_name' => 'Pedro Tosta',
        'registration' => '20131104',
        'password' => '123456'
    ]);
    var_dump($response->guard_name);

    $response = ReleaseHistory::create([
        'reason' => 'Teste',
        'release_type' => '34fcaa16-114d-4776-a714-41c3fc3f2cea',
        'student' => '34a538cb-5858-4e35-af37-34d013e5623e',
        'guard' => '3ce4b8fe-bf72-48c0-b1b4-1814a32355c7'
    ]);
    var_dump($response->id);

    $ReleaseHistory = ReleaseHistory::all();
    var_dump($ReleaseHistory[0]);

    return "Fim";
});
