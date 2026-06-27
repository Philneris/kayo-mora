<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Messages/Index', [
            'messages' => Message::latest()->get()
        ]);
    }

    public function show(Message $message)
    {
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }
        
        return Inertia::render('Admin/Messages/Show', [
            'message' => $message
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,archived',
        ]);

        $message->update($validated);

        return back()->with('success', 'Statut du message mis à jour.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message supprimé.');
    }
}
