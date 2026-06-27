<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\Message;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'artworks_count' => Artwork::count(),
                'exhibitions_count' => Exhibition::count(),
                'unread_messages_count' => Message::where('status', 'new')->count(),
            ]
        ]);
    }
}
