<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return response()->json($exercises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exercise = Exercise::create($request->all());
        return response()->json($exercise, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercise = Exercise::find($id);
        if (is_null($exercise)) {
            return response()->json(['message' => 'Exercise not found'], 404);
        }
        return response()->json($exercise);
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
        $exercise = Exercise::find($id);
        if (is_null($exercise)) {
            return response()->json(['message' => 'Exercise not found'], 404);
        }
        $exercise->update($request->all());
        return response()->json($exercise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::find($id);
        if (is_null($exercise)) {
            return response()->json(['message' => 'Exercise not found'], 404);
        }
        $exercise->delete();
        return response()->json(null, 204);
    }

}
