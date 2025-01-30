<?php

namespace App\Http\Controllers;
use App\Models\Status;

use Illuminate\Http\Request;

class StatusCrontoller extends Controller
{
    // Obtener todas las tareas
    public function index()
    {
        return response()->json(Status::all());
    }
}
