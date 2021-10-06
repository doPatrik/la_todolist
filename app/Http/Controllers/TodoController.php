<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view("Todo.index", compact('todos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {

        Todo::create($request->validated());

        return redirect(route('todo.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);

        return view('Todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->validated());

        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();

        return redirect(route('todo.index'));
    }

    public function complete(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['is_completed' => $request->input('complete', false)]);

        return redirect(route('todo.index'));
    }

    public function delayed(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['is_delayed' => $request->input('delayed', false)]);

        return redirect(route('todo.index'));
    }
}
