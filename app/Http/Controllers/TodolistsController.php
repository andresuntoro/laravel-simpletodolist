<?php

namespace App\Http\Controllers;

use App\Todolist;
use Illuminate\Http\Request;

class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array('list' => Todolist::orderBy('created_at', 'DESC')->where('status', 0)->paginate(5));
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['todo' => 'required']);
        Todolist::create($request->all()); // Inserting data into the 'todo' column, the 'status' column has been handled by MySQL using the default value.
        return redirect('/')->with('status', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        Todolist::where('id', $todolist->id)->update(['status' => 1]);
        return redirect('/')->with('status', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        Todolist::destroy($todolist->id);
        return redirect('/')->with('status', 'Data Deleted Successfully');
    }
}
