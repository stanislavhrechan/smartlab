<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        abort_unless($project->status === 'published', 404);

        $project->load([
            'user',
            'partners',
            'goals',
            'activities.partners',
            'outputs',
            'images',
        ]);

        return view('projects.show', compact('project'));
    }
}
