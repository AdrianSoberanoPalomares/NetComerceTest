<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de la tarea
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Verificar si el usuario ya tiene 5 tareas pendientes
        $pendingTasks = Task::where('user_id', $request->user_id)
            ->where('is_completed', false)
            ->count();

        if ($pendingTasks >= 5) {
            return response()->json(['error' => 'El usuario ya tiene 5 tareas pendientes.'], 400);
        }

        // Crear la tarea con los datos validados
        $task = Task::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'company_id' => $validatedData['company_id'],
            'user_id' => $validatedData['user_id'],
        ]);

        // Retornar la tarea creada con las relaciones 'user' y 'company' cargadas
        return response()->json($task->load('user', 'company'), 201);
    }
}



/*  $task = Task::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'company_id' => $validatedData['company_id'],
            'user_id' => $validatedData['user_id'],
        ]);

        return response()->json($task->load('user', 'company'), 201); */
