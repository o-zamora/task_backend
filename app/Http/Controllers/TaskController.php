<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TskTask;

class TaskController extends Controller
{
    // Obtener la longitud de la lista de tareas para la paginación de la API
    public function getLength()
    {
        return TskTask::count();
    }

    // Obtener todas las tareas, con opción de filtrar por id_status
    public function index(Request $request)
    {
        $query = TskTask::with('status');

        if ($request->has('id_status')) {
            $query->where('id_status', $request->input('id_status'));
        }

        $task = $query->paginate(5);

        return response()->json($query->get());
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'id_status' => 'required|integer',
            'due_date' => 'nullable|date',
        ]);

        // Establecer la fecha actual manualmente
        $data = $request->all();
        $data['created_at'] = now(); // Establece la fecha y hora actual en created_at
        $data['updated_at'] = null; // Establece null en updated_at

        // Crear la tarea
        $task = TskTask::create($data);
        return response()->json($task, 201);
    }

    // Obtener una tarea por ID
    public function show($id)
    {
        return response()->json(TskTask::findOrFail($id));
    }

    // Actualizar una tarea
    public function update(Request $request, $id)
    {
        $task =

            TskTask::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        TskTask::findOrFail($id)->delete();
        return response()->json(['message' => 'Tarea eliminada']);
    }
}
