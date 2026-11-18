<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::with('user')->latest()->paginate(15);
        return view('dashboard.admin.events.events', compact('events'));
    }

    public function create()
    {
        return view('dashboard.admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:events,slug',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'start_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'map_link' => 'nullable|url|max:255',
            'organizer' => 'nullable|string|max:255',
            'target_group' => 'nullable|string|max:255',
            'format' => 'nullable|string|max:255',
            'partner' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('dashboard.admin.events.index')
            ->with('success', 'Podujatie bolo úspešne pridané.');
    }

    public function edit(Event $event)
    {
        return view('dashboard.admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:events,slug,' . $event->id,
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'start_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'map_link' => 'nullable|url|max:255',
            'organizer' => 'nullable|string|max:255',
            'target_group' => 'nullable|string|max:255',
            'format' => 'nullable|string|max:255',
            'partner' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            if ($event->image) Storage::disk('public')->delete($event->image);
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('dashboard.admin.events.index')
            ->with('success', 'Podujatie bolo úspešne upravené.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('dashboard.admin.events.index')
            ->with('success', 'Podujatie bolo úspešne vymazané.');
    }
}
