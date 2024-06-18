
<?php

use App\Http\Controllers\ResponsablesController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('taskslist.index');
});

Route::resource('/tasks', TaskController::class);
Route::resource('/responsables', ResponsablesController::class);