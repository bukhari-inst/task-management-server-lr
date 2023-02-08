<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new Task();
    }

    public function index()
    {
        $task = $this->task->all();

        return response()->json($task);
    }
}
