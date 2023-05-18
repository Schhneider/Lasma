<?php

namespace App\Http\Controllers;
use App\Models\planotajs;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        planotajs::where('finished', 1)
            ->orWhereDate('end_date', '<', date('Y-m-d'))
            ->delete();
        $todo = planotajs::all();
        return view('todo', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new planotajs();
        $todo->task_name = $request->task_name;
        $todo->end_date = $request->end_date;
        $todo->description = $request->description;
        $todo->start_date = date('Y-m-d');
        $todo->finished = 0;
        $todo->save();
        return redirect('todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = planotajs::findOrFail($id);
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $todo = planotajs::find($id);
        $todo->task_name = $request->task_name;
        $todo->end_date = $request->end_date;
        $todo->description = $request->description;
        $todo->finished = $request->has('finished') ? 1 : 0;
        $todo->save();
        
        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = planotajs::find($id);
        $todo->delete();  
        return redirect('todo');
    }
}
