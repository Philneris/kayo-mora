<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ArtworkController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Artworks/Index', [
            'artworks' => Artwork::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Artworks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:photo,painting,digital',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'description' => 'required|string',
            'cover_image' => 'nullable|url', // Simplified for now, should ideally be file upload
            'is_published' => 'boolean',
        ]);

        Artwork::create($validated + ['slug' => Str::slug($request->title)]);

        return redirect()->route('admin.artworks.index')->with('success', 'Œuvre créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Artwork $artwork)
    {
        return Inertia::render('Admin/Artworks/Edit', [
            'artwork' => $artwork
        ]);
    }

    public function update(Request $request, Artwork $artwork)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:photo,painting,digital',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'description' => 'required|string',
            'cover_image' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        $artwork->update($validated + ['slug' => Str::slug($request->title)]);

        return redirect()->route('admin.artworks.index')->with('success', 'Œuvre mise à jour.');
    }

    public function destroy(Artwork $artwork)
    {
        $artwork->delete();
        return redirect()->route('admin.artworks.index')->with('success', 'Œuvre supprimée.');
    }
}
