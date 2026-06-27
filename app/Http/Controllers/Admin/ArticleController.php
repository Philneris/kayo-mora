<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Articles/Index', [
            'articles' => \App\Models\Article::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Articles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        \App\Models\Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article de presse/actualité créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not used separately right now
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Article $article)
    {
        return Inertia::render('Admin/Articles/Edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé.');
    }
}
