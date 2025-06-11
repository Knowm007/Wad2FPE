<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
{
    $user = auth()->user();

    $completedTasks = $user->tasks()->where('status', 'completed')->count();
    $pendingTasks = $user->tasks()->where('status', 'pending')->count();

    // Iba pang code...
}

}
