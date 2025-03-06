<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryMakeTest;

class HistoryMakeTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = HistoryMakeTest::all();
        return response()->json($history);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $history = HistoryMakeTest::create($request->all());
        return response()->json($history, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = HistoryMakeTest::find($id);
        if (is_null($history)) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        return response()->json($history);
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
        $history = HistoryMakeTest::find($id);
        if (is_null($history)) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        $history->update($request->all());
        return response()->json($history);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = HistoryMakeTest::find($id);
        if (is_null($history)) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        $history->delete();
        return response()->json(null, 204);
    }

    public function getHistoryByUserId(Request $request)
    {
        $history = HistoryMakeTest::where('user_id', $request->user_id)->where('exercise_id',$request->test_id)
                ->with('user')
                ->with('exercise')
                ->get();
        return response()->json($history);
    }
}
