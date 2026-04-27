<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();

        // nombre de tâches du jour
        $taches_aujourd_hui = $user->tasks()
            ->whereDate('due_date', Carbon::today())
            ->count();

        // nombre de tâches en retard
        $taches_en_retard = $user->tasks()
            ->where('status', '!=', 'terminee')
            ->whereDate('due_date', '<', Carbon::today())
            ->count();

        // progression globale en pourcentage
        $total    = $user->tasks()->count();
        $terminees = $user->tasks()->where('status', 'terminee')->count();
        $progression = $total > 0 ? round(($terminees / $total) * 100) : 0;

        return view('dashboard', compact(
            'taches_aujourd_hui',
            'taches_en_retard',
            'progression',
            'total'
        ));
    }
}