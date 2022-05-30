<?php
use Illuminate\Support\Facades\DB;
use App\Models\Bike;
use App\Models\Manager;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/bike', function () {
    return Bike::create([
        'bikeDesc' => request('bikeDesc'),
        'bikeCustId' => request('bikeCustId'),
        'bikeType' => request('bikeType'),
        'bikeNum' => request('bikeNum'),
    ]);
});

Route::get('/bike', function () {
    return Bike::all();
});

Route::post('/manager', function () {
    return Manager::create([
        'fName' => request('fName'),
        'lName' => request('lName'),
        'phone' => request('phone'),
        'email' => request('email'),
        'address' => request('address'),
    ]);
});

Route::get("/manager", function () {
    return Manager::all();
});

Route::post('/role', function () {
    return Role::create([
        'roleName' => request('roleName'),
        'roleDesc' => request('roleDesc'),
        'managerId' => request('managerId'),
    ]);
});

Route::get('/role', function () {
    $data = DB::table("roles")
    ->join("managers","roles.managerId","=", "managers.managerId")
    ->get();
    return Role::all();
});