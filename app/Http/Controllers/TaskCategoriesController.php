<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class TaskCategoriesController extends Controller
{

    public function index()
    {
        $category = Category::all();

        return response()->json($category);
    }

    public function show($id = false)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }
}
