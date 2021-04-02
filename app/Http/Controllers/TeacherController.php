<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function getdata()
    {
        $teacher = Models\Teacher::all();
        return response()->json([$teacher]);
    }

    public function index()
    {
        $teacher = Models\Teacher::all();
        return view('test1.crud.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test1.crud.create');
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
            'name' => 'required|max:255',
            'age' => 'required|numeric',
        ]);
        $show = Models\Teacher::create($validatedData);
   
        return redirect('/teacher')->with('success', 'Teacher is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Models\Teacher::findOrFail($id);

        return view('test1.crud.edit', compact('teacher'));
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
            'name' => 'required|max:255',
            'age' => 'required|numeric',
        ]);
        Models\Teacher::whereId($id)->update($validatedData);

        return redirect('/teacher')->with('success', 'Teacher Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Models\Teacher::findOrFail($id);
        $teacher->delete();

        return redirect('/teacher')->with('success', 'Teacher Data is successfully deleted');
    }
}
