@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Timesheet</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Edit Timesheet Form -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Timesheet Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="task_id" class="form-label">Task</label>
                    <select class="form-select" id="task_id" name="task_id" disabled>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}" {{ $task->id == $timesheet->task_id ? 'selected' : '' }}>
                                {{ $task->title }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="task_id" value="{{ $timesheet->task_id }}">
                    @error('task_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $timesheet->date) }}" required>
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hours_worked" class="form-label">Hours Worked</label>
                    <input type="number" class="form-control" id="hours_worked" name="hours_worked" value="{{ old('hours_worked', $timesheet->hours_worked) }}" required>
                    @error('hours_worked')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Comments</label>
                    <textarea class="form-control" id="editor" name="comments" rows="3">{{ old('comments', $timesheet->comments) }}</textarea>
                    @error('comments')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Timesheet</button>
                <a href="{{ route('timesheets.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
