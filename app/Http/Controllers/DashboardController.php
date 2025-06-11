<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $user = auth()->user();

    $totalNotes = $user->notes()->count();

    // Palitan ito ayon sa structure ng iyong tasks table
    $completedTasks = $user->tasks()->where('status', 'completed')->count();
    $pendingTasks = $user->tasks()->where('status', 'pending')->count();

    $latestNotes = $user->notes()->latest()->take(5)->get();

    // Example chart data - palitan ayon sa iyong data
    $chartLabels = ['January', 'February', 'March', 'April', 'May'];
    $chartData = [10, 20, 15, 30, 25];

    return view('dashboard', compact(
        'totalNotes',
        'completedTasks',
        'pendingTasks',
        'latestNotes',
        'chartLabels',
        'chartData'));
    }
}
