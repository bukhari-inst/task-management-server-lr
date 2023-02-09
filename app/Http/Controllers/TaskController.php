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
}
