<?php

namespace App\Http\Controllers\Web\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Task\StoreRequest;
use App\Jobs\UpdateStatisticJob;
use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct(
        public Task $task,
        public Admin $admin,
        public User $user,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->task->with('assignedTo', 'assignedBy')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = $this->admin->pluck('name', 'id');
        $users = $this->user->pluck('name', 'id');

        return view('tasks.create', compact('admins', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $task = Task::create($request->validated());

        dispatch(new UpdateStatisticJob($task));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
