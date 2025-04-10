<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timesheets = Timesheet::get();
        return view('timesheets.index', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::get();
        return view('timesheets.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|integer|exists:tasks,id',
            'date' => 'required|date',
            'hours_worked' => 'required|integer',
            'comments' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Timesheet::create([
            'task_id' => $request->task_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
            'hours_worked' => $request->hours_worked,
            'comments' => $request->comments,
        ]);

        return redirect()->back()->with('success', 'Timesheet entry added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view('timesheets.show', compact('timesheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $tasks = Task::get();
        return view('timesheets.edit', compact('timesheet', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|integer|exists:tasks,id',
            'date' => 'required|date',
            'hours_worked' => 'required|integer',
            'comments' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $timesheet->update([
            'task_id' => $request->task_id,
            'date' => $request->date,
            'hours_worked' => $request->hours_worked,
            'comments' => $request->comments
        ]);
        return redirect()->route('timesheets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();
        return redirect()->route('timesheets.index');
    }
}
