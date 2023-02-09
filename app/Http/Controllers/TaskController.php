<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        // echo ($tasks->id);

        $data = [];
        foreach ($tasks as $task) {
            $data[] = [
                "id" => $task->id,
                "Task_id" => $task->Category->id,
                "Task" => $task->Category->name,
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
            "Task_id" => $tasks->Category->id,
            "Task" => $tasks->Category->name,
            "title" => $tasks->title,
            "description" => $tasks->description,
            "startdate" => $tasks->startdate,
            "finishdate" => $tasks->finishdate,
            "status" => $tasks->status,
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'startdate' => 'required',
            'finishdate' => 'required',
            'status' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $task = Task::create($request->all());

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'startdate' => 'required',
            'finishdate' => 'required',
            'status' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }

    public function destroy($id = false)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json($task);
    }
}
