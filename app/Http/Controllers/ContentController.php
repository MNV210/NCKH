<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = Content::where('category_id',$request->category_id)->with('category')->get();

        return response()->json($contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Content::create($request->all());
        return response()->json($content, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        return response()->json($content);
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
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        $content->update($request->all());
        return response()->json($content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        $content->delete();
        return response()->json(null, 204);
    }
}
