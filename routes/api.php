<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusCrontoller;

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
Route::get('/status', [StatusCrontoller::class, 'index']); // Listar estatus
Route::get('/tasks/length', [TaskController::class, 'getLength']); // Obtener la longitud de la lista de tareas
Route::get('/tasks', [TaskController::class, 'index']); // Listar tareas
Route::post('/tasks', [TaskController::class, 'store']); // Crear tarea
Route::get('/tasks/{id}', [TaskController::class, 'show']); // Obtener tarea por ID
Route::put('/tasks/{id}', [TaskController::class, 'update']); // Actualizar tarea
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']); // Eliminar tarea

?>
