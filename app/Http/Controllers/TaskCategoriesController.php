<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $category = Category::create($request->all());

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id = false)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json($category);
    }
}
