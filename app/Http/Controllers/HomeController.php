<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $tasks = $user->tasks()->get();

        return view('task.index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        $text = $request->get('title');

        if(count(explode(' ', $text)) < 2)
            return redirect('/')->with('error', 'Task should contain at least 2 words');

        $task = new Task([
            'title' => $request->get('title')
        ]);

        $user = Auth::user();

        $user->tasks()->save($task);
   
        return redirect('/')->with('success', 'Task is successfully saved');
    }

    public function editTask($id)
    {
        $task = Task::findOrFail($id);

        if (Gate::denies('edit-task', $task)){
            return redirect('/')->with('error', 'You are not authorized to edit this post');
        }

        return view('task._edit', compact('task'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);
        
        $text = $request->get('title');

        if(count(explode(' ', $text)) < 2)
            return redirect()->back()->with('error', 'Task should contain at least 2 words');

        Task::whereId($id)->update($validatedData);

        return redirect('/')->with('success', 'Task is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/')->with('success', 'Task is successfully deleted');
    }
}