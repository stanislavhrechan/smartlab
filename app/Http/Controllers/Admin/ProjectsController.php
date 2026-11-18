<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Partner;
use App\Models\ProjectImage;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->with([
                'user:id,name',
                'partners:id,name',
                'activities.partners:id,name',
                'goals',
                'outputs',
                'images',
            ])
            ->latest()
            ->paginate(10);

        $partners = Partner::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('dashboard.admin.projects.projects', compact(
            'projects',
            'partners'
        ));
    }

    
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $uploadedFiles = [];

        try {
            $project = DB::transaction(function () use ($request, $validated, &$uploadedFiles) {

                $imagePath = null;

                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')
                        ->store('projects/covers', 'public');

                    $uploadedFiles[] = $imagePath;
                }

                $project = Project::create([
                    'user_id' => auth()->id(),

                    'title' => $validated['title'],
                    'slug' => $this->generateUniqueSlug($validated['title']),

                    'short_description' => $validated['short_description'] ?? null,
                    'description' => $validated['description'],

                    'image' => $imagePath,

                    'type' => $validated['type'],
                    'status' => $validated['status'],

                    'start_date' => $validated['start_date'] ?? null,
                    'end_date' => $validated['end_date'] ?? null,

                    'reward_type' => $validated['type'] === 'opportunity'
                        ? ($validated['reward_type'] ?? 'none')
                        : 'none',

                    'reward_amount' => $validated['type'] === 'opportunity'
                        && ($validated['reward_type'] ?? null) === 'fixed'
                            ? ($validated['reward_amount'] ?? null)
                            : null,

                    'reward_currency' => $validated['reward_currency'] ?? 'EUR',

                    'accepts_applications' => $validated['type'] === 'opportunity'
                        ? ($validated['accepts_applications'] ?? false)
                        : false,

                    'published_at' => $validated['status'] === 'published'
                        ? now()
                        : null,
                ]);

                $project->partners()->sync(
                    $validated['partners'] ?? []
                );

                foreach ($validated['goals'] ?? [] as $index => $goal) {
                    $project->goals()->create([
                        'description' => $goal['description'] ?? null,
                        'sort_order' => $index,
                    ]);
                }

                foreach ($validated['activities'] ?? [] as $index => $activityData) {

                    $activity = $project->activities()->create([
                        'title' => $activityData['title'],
                        'description' => $activityData['description'] ?? null,
                        'sort_order' => $index,
                    ]);

                    $activity->partners()->sync(
                        $activityData['partners'] ?? []
                    );
                }

                foreach ($validated['outputs'] ?? [] as $index => $output) {
                    $project->outputs()->create([
                        'description' => $output['description'] ?? null,
                        'sort_order' => $index,
                    ]);
                }

                foreach ($request->file('gallery', []) as $index => $file) {

                    $imagePath = $file->store('projects/gallery', 'public');

                    $uploadedFiles[] = $imagePath;

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'image_path' => $imagePath,
                        'sort_order' => $index,
                    ]);
                }

                return $project;
            });

            return redirect()
                ->route('dashboard.admin.projects')
                ->with('success', 'Projekt bol úspešne vytvorený.');

        } catch (Throwable $exception) {

            Storage::disk('public')->delete($uploadedFiles);

            throw $exception;
        }
    }


    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);

        $originalSlug = $slug;
        $counter = 1;

        while (
            Project::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;

        }

        return $slug;
    }

    public function remove(){}
    
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $uploadedFiles = [];
        $oldImagePath = null;

        try {

            DB::transaction(function () use (
                $request,
                $validated,
                $project,
                &$uploadedFiles,
                &$oldImagePath
            ) {

                /*
                |--------------------------------------------------------------------------
                | 01. Cover image
                |--------------------------------------------------------------------------
                */

                $imagePath = $project->image;

                if ($request->hasFile('image')) {

                    $oldImagePath = $project->image;

                    $imagePath = $request->file('image')
                        ->store('projects/covers', 'public');

                    $uploadedFiles[] = $imagePath;
                }


                /*
                |--------------------------------------------------------------------------
                | 02. Update project
                |--------------------------------------------------------------------------
                */

                $project->update([

                    'title' => $validated['title'],

                    'slug' => $validated['title'] !== $project->title
                        ? $this->generateUniqueSlug($validated['title'], $project->id)
                        : $project->slug,

                    'short_description' => $validated['short_description'] ?? null,

                    'description' => $validated['description'],

                    'image' => $imagePath,

                    'type' => $validated['type'],

                    'status' => $validated['status'],

                    'start_date' => $validated['start_date'] ?? null,

                    'end_date' => $validated['end_date'] ?? null,

                    'reward_type' => $validated['type'] === 'opportunity'
                        ? ($validated['reward_type'] ?? 'none')
                        : 'none',

                    'reward_amount' => $validated['type'] === 'opportunity'
                        && ($validated['reward_type'] ?? null) === 'fixed'
                            ? ($validated['reward_amount'] ?? null)
                            : null,

                    'reward_currency' => $validated['reward_currency'] ?? 'EUR',

                    'accepts_applications' => $validated['type'] === 'opportunity'
                        ? ($validated['accepts_applications'] ?? false)
                        : false,

                    'published_at' => $validated['status'] === 'published'
                        ? ($project->published_at ?? now())
                        : null,

                ]);


                /*
                |--------------------------------------------------------------------------
                | 03. Project partners
                |--------------------------------------------------------------------------
                */

                $project->partners()->sync(
                    $validated['partners'] ?? []
                );


                /*
                |--------------------------------------------------------------------------
                | 04. Goals
                |--------------------------------------------------------------------------
                */

                // Remove previous goals.
                $project->goals()->delete();

                if ($validated['type'] === 'informational') {

                    foreach ($validated['goals'] ?? [] as $index => $goal) {

                        $project->goals()->create([

                            'description' => $goal['description'] ?? null,

                            'sort_order' => $index,

                        ]);

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | 05. Activities
                |--------------------------------------------------------------------------
                */

                // Remove previous activities and their partner relations.
                foreach ($project->activities as $activity) {
                    $activity->partners()->detach();
                }

                $project->activities()->delete();

                if ($validated['type'] === 'informational') {

                    foreach ($validated['activities'] ?? [] as $index => $activityData) {

                        $activity = $project->activities()->create([

                            'title' => $activityData['title'],

                            'description' => $activityData['description'] ?? null,

                            'sort_order' => $index,

                        ]);

                        $activity->partners()->sync(
                            $activityData['partners'] ?? []
                        );

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | 06. Outputs
                |--------------------------------------------------------------------------
                */

                $project->outputs()->delete();

                if ($validated['type'] === 'informational') {

                    foreach ($validated['outputs'] ?? [] as $index => $output) {

                        $project->outputs()->create([

                            'description' => $output['description'] ?? null,

                            'sort_order' => $index,

                        ]);

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | 07. Gallery
                |--------------------------------------------------------------------------
                */

                // Existing gallery images are preserved.
                // New images are appended.

                foreach ($request->file('gallery', []) ?? [] as $index => $file) {

                    $imagePath = $file->store('projects/gallery', 'public');

                    $uploadedFiles[] = $imagePath;

                    ProjectImage::create([

                        'project_id' => $project->id,

                        'image_path' => $imagePath,

                        'sort_order' => $project->images()->count(),

                    ]);

                }

            });


            /*
            |--------------------------------------------------------------------------
            | 08. Delete old cover after successful transaction
            |--------------------------------------------------------------------------
            */

            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }


            return redirect()
                ->route('dashboard.admin.projects')
                ->with('success', 'Projekt bol úspešne aktualizovaný.');


        } catch (Throwable $exception) {

            // Delete newly uploaded files if the update failed.
            Storage::disk('public')->delete($uploadedFiles);

            throw $exception;

        }
    }

}
