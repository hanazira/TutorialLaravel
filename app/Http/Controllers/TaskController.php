<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function store(Request $request)
        {

        //validation
        $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'type' => 'required',
        'duedate' => 'required',
        'user_id' => 'required|exists:users,id'
        ]);

        // Task::create($request->all()); #for all request


        Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'type' => $request->type,
        'duedate' => $request->duedate,
        'user_id' => $request->user_id
        ]);
        return redirect()->route('task.create')->with('success', 'Task Created successfully.');
        }


        public function create()
        {
            $users = User::all();
            return view('task.create', compact('users'));     //view guna task,, web guna tasks
        }

        public function index()
        {
        #call the orm with user() method on model Task
        $tasks = Task::with('user')->get();
        return view('task.index', compact('tasks'));
        }

        public function show($id)
        {
        $task = Task::find($id);
        return view('task.show', compact('task'));
        }

        public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'type' => 'required',
        'duedate' => 'required',
    ]);

    // Find the task by ID
    $task = Task::find($id);

    // Update the task with specific fields from the request
    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'type' => $request->type,
        'duedate' => $request->duedate,
        'user_id' => $request->user_id,
    ]);

    // Redirect to the tasks index with a success message
    return redirect()->route('task.index')->with('success', 'Task updated successfully');
}

public function edit($id)
{
    // Find the task and get all users
    $task = Task::find($id);
    $users = User::all();

    // Return the edit view with the task and user data
    return view('task.edit', compact('task', 'users'));
}

public function destroy($id)
{
    // Find the task by ID
    $task = Task::find($id);

    // Delete the task
    $task->delete();

    // Redirect to the tasks index with a success message
    return redirect()->route('task.index')->with('success', 'Task deleted successfully');
}

}

