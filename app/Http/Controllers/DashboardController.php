<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();

        $tasksDueToday = $user->tasks()
            ->whereDate('due_date', $today)
            ->count();

        $tasksLate = $user->tasks()
            ->where('status', '!=', 'terminee')
            ->whereDate('due_date', '<', $today)
            ->count();

        $totalTasks = $user->tasks()->count();
        $doneTasks  = $user->tasks()->where('status', 'terminee')->count();
        $progression = $totalTasks > 0 ? round(($doneTasks / $totalTasks) * 100) : 0;

        return view('dashboard', compact(
            'tasksDueToday',
            'tasksLate',
            'progression',
            'totalTasks',
            'doneTasks'
        ));
    }
}