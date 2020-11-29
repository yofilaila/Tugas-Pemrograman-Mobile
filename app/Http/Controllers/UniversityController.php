<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::paginate(10);
        return response()->json(['success'=>true,'result'=>$universities]);
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
        $u = new University();
        $u->name = $request->name;
        $u->save();
        return response()->json(['success'=>true,'message'=>'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = University::where('id',$id)->first();
        return response()->json(['success'=>true,'result'=>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $u = University::where('id',$id)->first();
        $u->name = $request->name;
        $u->save();
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
        $u = University::where('id',$id)->delete();
        return response()->json(['success'=>true,'message'=>'data berhasil dihapus']);
    }
}
