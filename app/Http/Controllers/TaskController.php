<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();

        $data = [];
        foreach ($tasks as $task) {
            $data[] = [
                "id" => $task->id,
                "category_id" => $task->category->id,
                "category" => $task->category->name,
                "title" => $task->title,
                "description" => $task->description,
                "startdate" => $task->startdate,
                "finishdate" => $task->finishdate,
                "status" => $task->status,
            ];
        }
        return response()->json($data);
    }

    public function show($id = false)
    {
        $tasks = Task::findOrFail($id);

        $data = [];
        $data[] = [
            "id" => $tasks->id,
            "category_id" => $tasks->category->id,
            "category" => $tasks->category->name,
            "title" => $tasks->title,
            "description" => $tasks->description,
            "startdate" => $tasks->startdate,
            "finishdate" => $tasks->finishdate,
            "status" => $tasks->status,
        ];

        return response()->json($data);
    }
}
