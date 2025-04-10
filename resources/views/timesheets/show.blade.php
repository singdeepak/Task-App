@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Timesheet Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Timesheet Card -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Task Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Task:</strong> {{ $timesheet->task->title ?? 'Task #' . $timesheet->task_id }}</p>
                    <p class="card-text"><strong>User:</strong> {{ $timesheet->user->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Date:</strong> {{ \Carbon\Carbon::parse($timesheet->date)->format('d M Y') }}</p>
                    <p class="card-text"><strong>Hours Worked:</strong> {{ $timesheet->hours_worked }} hours</p>
                </div>
            </div>

            <div class="mt-4">
                <p class="card-text"><strong>Comments:</strong> {{ $timesheet->comments ?? 'No comments' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
