<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::paginate(10);
        return response()->json(['sucess'=>true,'result'=>$majors]);
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
    
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors(),
        ], 422);
        }
        $m = new Major();
        $m->name = $request->name;
        $m->save();
        return response()->json(['sucess'=>true,'message'=>'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Major::where('id',$id)->first();
        return response()->json(['success'=>true,'result'=>$m]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $m = Major::where('id',$id)->first();
        $m->name = $request->name;
        $m->save();
        return response()->json(['success'=>true,'message'=>'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Major::where('id',$id)->delete();
        return response()->json(['success'=>true,'message'=>'data berhasil dihapus']);
    }
}
