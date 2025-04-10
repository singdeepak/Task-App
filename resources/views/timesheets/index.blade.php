@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Timesheet Entries</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('timesheets.create') }}" class="btn btn-primary mb-3">+ Add New Entry</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>User</th>
                <th>Date</th>
                <th>Hours Worked</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($timesheets as $timesheet)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $timesheet->task->title ?? 'N/A' }}</td>
                    <td>{{ $timesheet->user->name ?? 'N/A' }}</td>
                    <td>{{ $timesheet->date }}</td>
                    <td>{{ $timesheet->hours_worked }}</td>
                    <td>{!! $timesheet->comments ?? 'N/A' !!}</td>
                    <td>
                        <a href="{{ route('timesheets.show', $timesheet->id) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('timesheets.edit', $timesheet->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No timesheet entries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
