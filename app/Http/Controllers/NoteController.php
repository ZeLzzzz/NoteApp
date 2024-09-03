<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function show($slug)
    {
        $note = note::where('slug', $slug)->first();
        session([ 'title' => $note->title ]);
        return view('note.note', compact('note'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $note = new note();
        $note->user_id = Auth::user()->id;
        $note->title = $request->title;
        $note->slug = str()->slug($request->title) . '-' . time() . '-' . rand(1111, 9999);
        $note->save();

        return redirect()->route('note.show', $note->slug)->with('success', 'Note created successfully');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $note = note::where('slug', $slug)->first();
        $note->title = $request->title;
        $note->note = $request->note;
        $note->slug = str()->slug($request->title) . '-' . time() . '-' . rand(1111, 9999);
        $note->save();

        return redirect()->route('note.show', $note->slug)->with('success', 'Note updated successfully');
    }

    public function destroy($slug)
    {
        $note = note::where('slug', $slug)->first();
        $note->delete();

        return redirect()->route('home')->with('success', 'Note deleted successfully');
    }
}
