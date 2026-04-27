<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $today = Carbon::today();

        $tasksTodayCount = $user->tasks()->whereDate('due_date', $today)->count();
        $lateTasksCount = $user->tasks()->whereDate('due_date', '<', $today)->where('status', '!=', 'Terminée')->count();
        
        $totalTasks = $user->tasks()->count();
        $completedTasks = $user->tasks()->where('status', 'Terminée')->count();
        $progressPercentage = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        return view('dashboard', compact('tasksTodayCount', 'lateTasksCount', 'progressPercentage'));
    }
}