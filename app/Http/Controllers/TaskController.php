<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $query = Auth::user()->tasks()->with('category');

        // Filtres
        if (request('status')) {
            $query->where('status', request('status'));
        }
        if (request('priority')) {
            $query->where('priority', request('priority'));
        }
        if (request('category_id')) {
            $query->where('category_id', request('category_id'));
        }
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        $tasks = $query->latest()->paginate(10);
        $categories = Auth::user()->categories()->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Auth::user()->categories()->get();
        return view('tasks.create', compact('categories'));
    }

    public function store(StoreTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        $categories = Auth::user()->categories()->get();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour !');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }

    // Méthode bonus : changer le statut rapidement
    public function updateStatus(Task $task)
    {
        $this->authorize('update', $task);

        $statuts = ['a_faire', 'en_cours', 'terminee'];
        $current = array_search($task->status, $statuts);
        $next = $statuts[($current + 1) % count($statuts)];

        $task->update(['status' => $next]);

        return back()->with('success', 'Statut mis à jour !');
    }
}