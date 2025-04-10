@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Log Timesheet Entry</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('timesheets.store') }}" method="POST">
        @csrf

        <!-- Task ID -->
        <div class="mb-3">
            <label for="task_id" class="form-label">Select Task</label>
            <select class="form-select" id="task_id" name="task_id" required>
                <option disabled selected>-- Select Task --</option>
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}">
                        {{ $task->title }}
                    </option>
                @endforeach
            </select>
        </div>
        

        <!-- Date -->
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <!-- Hours Worked -->
        <div class="mb-3">
            <label for="hours_worked" class="form-label">Hours Worked</label>
            <input type="number" step="0.1" min="0" max="24" class="form-control" id="hours_worked" name="hours_worked" value="{{ old('hours_worked') }}" required>
        </div>

        <!-- Comments -->
        <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" id="editor" name="comments" rows="3">{{ old('comments') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Log Hours</button>
    </form>
</div>
@endsection
