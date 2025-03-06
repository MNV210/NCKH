<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Head_Contents;

class HeadContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('category_id')){
            $head_contents = Head_Contents::where('category_id',$request->category_id)->with('category')->get();
        } else if($request->has('title')){
            $head_contents = Head_Contents::where('title','like','%'.$request->title.'%')->with('category')->get();
        }
        else{
            $head_contents = Head_Contents::with('category')->get();
        }

        return response()->json($head_contents);
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
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
