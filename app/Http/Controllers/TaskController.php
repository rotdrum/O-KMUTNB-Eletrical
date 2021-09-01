<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index($id)
    {
        //
        $tasks = Task::where("project_id", $id)->get();

        return view("task/index", [
            'tasks' => $tasks,
            'project_id' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        return view("task/create", ['project_id'=>$project_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id)
    {
        $request->validate([
            'name'=> 'required'
        ]);
        Task::create([
            'name'=> $request->post('name'),
            'project_id'=>$project_id
        ]);

        return redirect()->route('task.index', ['project_id'=>$project_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Task::findOrFail($id);
        return view('task/edit', ['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Task::findOrFail($id);
        $request->validate([
            'name'=> 'required|unique:task,name,'.$id.',id'
        ]);

        $model->update([
            'name'=>$request->post('name')
        ]);

        return redirect()->route('task.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Task::findOrFail($id);
        $model->delete();
    }
}
