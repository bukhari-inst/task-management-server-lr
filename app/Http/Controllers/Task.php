<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class Task extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $user = $this->user->all();

        return response()->json($user);
    }
}
