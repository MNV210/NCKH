<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Question::query();

        if($request->has('category_id')){
            $questions->where('category_id', $request->category_id);
        }   
        if($request->has('exercise_id')){
            $questions->where('exercise_id', $request->exercise_id);
        }
        $questions = $questions->get();
        return response()->json($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        return response()->json($question);
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
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->update($request->all());
        return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->delete();
        return response()->json(null, 204);
    }
}
