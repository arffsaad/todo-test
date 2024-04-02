<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
            // 'user_id' => auth()->id(), // commented before auth scaffolding
        ]);

        return response()->json($todo, 201);
    }

    public function get()
    {
        $todos = Todo::all();
        //$todos = Todo::where('user_id', auth()->id())->get(); // commented before auth scaffolding
        return response()->json($todos);
    }

    public function complete(Request $request)
    {
        $todo = Todo::find($request->id);
        
        // check if todo belongs to the authenticated user
        // if ($todo->user_id !== auth()->id()) {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }

        $todo->update([
            'completed' => true,
        ]);

        return response()->json($todo);
    }

    public function uncomplete(Request $request)
    {
        $todo = Todo::find($request->id);
        
        // check if todo belongs to the authenticated user
        // if ($todo->user_id !== auth()->id()) {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }

        $todo->update([
            'completed' => false,
        ]);

        return response()->json($todo);
    }
}
