<?php

namespace App\Http\Controllers;

use App\Models\TaskCetegories;

use Illuminate\Http\Request;

class TaskCategoriesController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new TaskCetegories();
    }
    public function index()
    {
        $task = $this->task->all();

        return response()->json($task);
    }
}
