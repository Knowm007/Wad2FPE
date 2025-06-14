<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = auth()->user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteRequest $request)
    {
        auth()->user()->notes()->create($request->validated());
        return redirect('/notes')->with('success', 'Note created successfully!');
    }

    public function show(Note $note)
    {
        if (Gate::denies('update-note', $note)) {
            abort(403, 'You are not authorized to view this note.');
        }

        return view('notes.show', compact('note'));
    }


    public function edit(Note $note)
    {
        Gate::authorize('update-note', $note);
        return view('notes.edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note)
    {
        Gate::authorize('update-note', $note);

        $note->update($request->validated());
        return redirect('/notes')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        Gate::authorize('delete-note', $note);

        $note->delete();
        return redirect('/notes')->with('success', 'Note deleted successfully!');
    }
}
