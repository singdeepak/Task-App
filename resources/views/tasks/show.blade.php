@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">📋 Task Details</h4>
                </div>

                <div class="card-body bg-light">
                    <div class="mb-3">
                        <h5 class="text-secondary">Title:</h5>
                        <p class="fw-semibold">{{ $task->title }}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="text-secondary">Description:</h5>
                        <p>{!! $task->description !!}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="text-secondary">Status:</h5>
                        <span class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status ===  'in_progress' ? 'warning' : 'danger') }} px-3 py-2 fs-6">{{ $task->status }}</span>
                    </div>

                    <div class="mb-3">
                        <h5 class="text-secondary">Assigned To:</h5>
                        <p>{{ $task->user->name }}</p>
                    </div>
                </div>

                <div class="card-footer bg-white text-end rounded-bottom-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">
                        ⬅ Back to List
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
