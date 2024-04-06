<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\CourseType;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
});


Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'teste'
], function () {
    Route::get('/', function () {
        return 'ok';
    });
});
