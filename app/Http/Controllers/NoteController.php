<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login'); // Redirect to login page
        // }
        $notes = Note::orderBy('created_at', 'desc')
            ->get();
        return response()->json(['status' => 'success', 'code' => 200, 'data' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = $request->user()->id;
        $data['user_name'] = $request->user()->name;
        $note = Note::create($data);

        return response()->json(['status' => 'success', 'code' => 200, 'message' => "note created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return response()->json(['status' => 'success', 'code' => 200, 'note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('editNote', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $note->update($data);

        return response()->json(['status' => 'success', 'code' => 200, 'message' => "note updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $note->delete();

        return response()->json(['status' => 'success', 'code' => 200, 'message' => "note deleted successfully"]);
    }
}
