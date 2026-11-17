<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class StudentiController extends Controller
{
    public function index()
    {
        $projects = Project::query()
        ->where('type', 'opportunity')
        ->latest()
        ->get();

        return view('home.studenti', compact('projects'));
    }
}
