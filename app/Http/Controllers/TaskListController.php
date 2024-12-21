<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasklists = TaskList::all();
        return view('tasklists.index', compact('tasklists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasklists.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'completed' => 'nullable|boolean', // completed phải là boolean
        ]);

        TaskList::create($validated);

        return redirect()->route('tasklists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasklists = TaskList::find($id);
        $tasklists = DB::select('select * from task_lists where id = ?', [$id]);
        return view('tasklists.show', compact('tasklists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasklists = TaskList::find($id);
        return view('tasklists.edit', compact('tasklists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);
        $tasklists = TaskList::find($id);
        $tasklists->update($validated);
        return redirect()->route('tasklists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasklists = TaskList::find($id);
        $tasklists->delete();
        return redirect()->route('tasklists.index');
    }
}
