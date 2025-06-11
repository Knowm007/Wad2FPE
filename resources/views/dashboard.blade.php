@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- Welcome Message -->
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>Glad to see you back.</p>

        <!-- Summary Cards -->
        <div class="dashboard-cards" style="display: flex; gap: 1rem; margin-bottom: 2rem;">
            <div class="card" style="padding: 1rem; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                <h3>Total Notes</h3>
                <p>{{ $totalNotes }}</p>
            </div>
            <div class="card" style="padding: 1rem; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                <h3>Completed Tasks</h3>
                <p>{{ $completedTasks }}</p>
            </div>
            <div class="card" style="padding: 1rem; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                <h3>Pending Tasks</h3>
                <p>{{ $pendingTasks }}</p>
            </div>
        </div>

        <!-- Latest Notes List -->
        <h2>Latest Notes</h2>
        <ul>
            @forelse ($latestNotes as $note)
                <li><a href="{{ route('notes.show', $note->id) }}">{{ $note->title }}</a></li>
            @empty
                <li>No notes found.</li>
            @endforelse
        </ul>

        <!-- Chart Section -->
        <h2>Notes Created Over Time</h2>
        <canvas id="notesChart" width="400" height="200"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('notesChart').getContext('2d');
            const notesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Notes Created',
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>

        <!-- Quick Links -->
        <div class="quick-links" style="margin-top: 2rem;">
            <a href="{{ route('notes.create') }}" class="btn btn-primary" style="margin-right: 1rem;">Create New Note</a>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">View All Notes</a>
        </div>
    </div>
@endsection
