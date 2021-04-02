<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'age' => 'required|numeric',
        // ]);
        // $show = Models\Teacher::create($validatedData);
   
        // return redirect('/teacher')->with('success', 'Teacher is successfully saved');
    }
}
