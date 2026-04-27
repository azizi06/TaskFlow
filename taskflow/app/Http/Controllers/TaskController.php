<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // afficher la liste des tâches avec filtres
    public function index(Request $request) {
        $user  = Auth::user();
        $query = $user->tasks()->with('category');

        // filtre par statut
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // filtre par priorité
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // filtre par catégorie
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $tasks      = $query->orderBy('due_date')->paginate(10);
        $categories = $user->categories()->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create() {
        $categories = Auth::user()->categories()->get();
        return view('tasks.create', compact('categories'));
    }

    public function store(TaskRequest $request) {
        Auth::user()->tasks()->create($request->validated());
        return redirect('tasks');
    }

    public function show(Task $task) {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task) {
        $categories = Auth::user()->categories()->get();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(TaskRequest $request, Task $task) {
        $task->update($request->validated());
        return redirect('tasks');
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect('tasks');
    }

    // changer le statut d'une tâche
    public function changerStatut(Request $request, Task $task) {
        $task->update(['status' => $request->input('status')]);
        return redirect('tasks');
    }
}