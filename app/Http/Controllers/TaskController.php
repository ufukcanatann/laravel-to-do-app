<?php

namespace App\Http\Controllers;

use App\Models\Task;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        $completed = DB::table('tasks')->pluck('completed');
        return view('tasks', compact("tasks","completed"));
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/tasks');
    }

    public function complete(Task $task)
    {
        $task->completed = 1;
        $task->save();
        
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla tamamlandı.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla eklendi.');
    }
}
