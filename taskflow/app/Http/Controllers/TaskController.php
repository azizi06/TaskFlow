<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index()
    {
        $tasks = auth()->user()->tasks()->with('category')->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = auth()->user()->categories;
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:basse,moyenne,haute',
        ]);

        auth()->user()->tasks()->create($validated);
        return redirect()->route('tasks.index')->with('success', 'Tâche créée !');
    }
}
