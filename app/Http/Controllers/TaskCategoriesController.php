<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class TaskCategoriesController extends Controller
{
    protected $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index()
    {
        $category = $this->category->all();

        return response()->json($category);
    }
}
