<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Importación corregida

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de la tarea
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400 // Corregido
            ];
            return response()->json($data, 400);
        }

        // Verificar si el usuario ya tiene 5 tareas pendientes
        $pendingTasks = Task::where('user_id', $request->user_id)
            ->where('is_completed', false)
            ->count();

        if ($pendingTasks >= 5) {
            return response()->json(['error' => 'El usuario ya tiene 5 tareas pendientes.'], 400);
        }

        // Crear la tarea con los datos validados
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'company_id' => $request->company_id,
            'user_id' => $request->user_id
        ]);

        if (!$task) {
            $data = [
                'message' => 'Error al crear la tarea',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        // Retornar la tarea creada con las relaciones 'user' y 'company' cargadas
        return response()->json($task->load('user', 'company'), 201);
    }
}
