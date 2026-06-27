<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExhibitionController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Exhibitions/Index', [
            'exhibitions' => Exhibition::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Exhibitions/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'required|string',
            'is_published' => 'boolean',
        ]);

        Exhibition::create($validated);

        return redirect()->route('admin.exhibitions.index')->with('success', 'Exposition ajoutée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Exhibition $exhibition)
    {
        return Inertia::render('Admin/Exhibitions/Edit', [
            'exhibition' => $exhibition
        ]);
    }

    public function update(Request $request, Exhibition $exhibition)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $exhibition->update($validated);

        return redirect()->route('admin.exhibitions.index')->with('success', 'Exposition mise à jour.');
    }

    public function destroy(Exhibition $exhibition)
    {
        $exhibition->delete();
        return redirect()->route('admin.exhibitions.index')->with('success', 'Exposition supprimée.');
    }
}
