

<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'taskPage'])->name('show_task_page');
Route::get('/create-task-page', [TaskController::class,'index'])->name('create_task');
Route::post('/save-task', [TaskController::class, 'save'])->name('save_task');
Route::get('/show-task-details', [TaskController::class, 'taskDetails'])->name('show_task_deteails');
Route::match(['get', 'post'], '/edit-task/{id}', [TaskController::class, 'editTask'])->name('edit_task');
Route::get('/delete-task/{id}', [TaskController::class, 'destroy'])->name('delete_task');



