<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('responsable')->paginate(5);
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
      
        Task::create($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $tasks = Task::find($id);
        return response()->json($tasks);

    }


    public function update(Request $request, $id)
    {

        $tasks = Task::find($id);
        $tasks->todo = $request['todo'];
        $tasks->fecha = $request['fecha'];
        $tasks->completed = $request['completed'];
        $tasks->responsable_id = $request['responsable_id'];
        $tasks->update();
    }

    public function destroy($id)
    {

        $tasks = Task::find($id);
        $tasks->delete();
    }
}
