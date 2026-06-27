<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function index()
    {
        $featuredArtwork = Artwork::where('is_published', true)->latest()->first();
        return Inertia::render('Public/Home', [
            'featuredArtwork' => $featuredArtwork
        ]);
    }

    public function gallery()
    {
        $artworks = Artwork::where('is_published', true)->latest()->get();
        return Inertia::render('Public/Gallery', [
            'artworks' => $artworks
        ]);
    }

    public function showArtwork(Artwork $artwork)
    {
        $artwork->load('images');
        return Inertia::render('Public/ArtworkDetail', [
            'artwork' => $artwork
        ]);
    }

    public function exhibitions()
    {
        $exhibitions = Exhibition::where('is_published', true)->latest()->get();
        return Inertia::render('Public/Exhibitions', [
            'exhibitions' => $exhibitions
        ]);
    }

    public function about()
    {
        return Inertia::render('Public/About');
    }

    public function contact()
    {
        return Inertia::render('Public/Contact');
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return back()->with('success', 'Message envoyé avec succès !');
    }
}
