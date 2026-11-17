<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(3)->get();
        return view('welcome', compact('projects'));
    }
}
