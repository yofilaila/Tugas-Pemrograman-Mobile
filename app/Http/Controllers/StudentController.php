<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $students = Student::paginate(10);
        return response()->json(['success'=>true,'result'=>$students]);
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
            'nim' => 'required',
            'name' => 'required',
            'generation' => 'required',
            'gender' => 'required',
            'university_id' => 'required|integer',
            'major_id' => 'required|integer',
           
        ]);
    
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors(),
        ], 422);
        }
        $s = new Student();
        $s->nim = $request->nim;
        $s->name = $request->name;
        $s->generation = $request->generation;
        $s->gender = $request->gender;
        $s->university_id = $request->university_id;
        $s->major_id = $request->major_id;
        $s->save();
        return response()->json(['success'=>true,'message'=>'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $student = Student::where('nim',$nim)->first();
        return response()->json(['success'=>true,'result'=>$student]);
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
        $s = Student::where('nim',$request->nim)->first();
        $s->nim = $request->nim;
        $s->name = $request->name;
        $s->generation = $request->generation;
        $s->gender = $request->gender;
        $s->university_id = $request->university_id;
        $s->major_id = $request->major_id;
        $s->save();
        return response()->json(['success'=>true,'message'=>'Berhasil merubah data '.$s->nim]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Student::where('nim',$nim)->delete();
        return response()->json(['success'=>true,'message'=>'Berhasil menghapus data '.$request->nim]);
    }
}
