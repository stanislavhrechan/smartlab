<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest('published_at')->paginate(15);
        return view('dashboard.admin.articles.articles', compact('articles'));
    }

    public function create()
    {
        return view('dashboard.admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['title']);
        if (empty($validated['published_at'])) $validated['published_at'] = now();

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($validated);

        return redirect()->route('dashboard.admin.articles.index')
            ->with('success', 'Aktualita bola úspešne pridaná.');
    }

    public function edit(Article $article)
    {
        return view('dashboard.admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,' . $article->id,
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            if ($article->image) Storage::disk('public')->delete($article->image);
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('dashboard.admin.articles.index')
            ->with('success', 'Aktualita bola úspešne upravená.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('dashboard.admin.articles.index')
            ->with('success', 'Aktualita bola úspešne vymazaná.');
    }
}
