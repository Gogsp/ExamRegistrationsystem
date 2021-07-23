<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Course;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = Faculty::find($request->input('facid'));
        

        $department = Department::make([
            'name' => $request->input('name'),
        ]);
        $department->faculty_id = $faculty->id;
        $department->save();
        

        return redirect('/faculties/'.$faculty->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $department = Department::find($id);
        $fac_id = $department->faculty_id;
        $faculty = Faculty::find($fac_id);
        return view('departments.show',['department'=>$department,'faculty'=>$faculty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $fac_id = $department->faculty_id;
        $faculty = Faculty::find($fac_id);
        return view('departments.edit',['department'=>$department,'faculty'=>$faculty]);
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
        $request->validate([
            'name'=>'required',
        ]);

        $fac_id = $request->input('facId');
        $faculty = Faculty::find($fac_id);
        $department = Department::where('id',$id)
        ->update([
            'name' => $request->input('name'),
        ]);
      


        return redirect('/faculties/'.$faculty->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $faculty= $department->faculty_id;

        $department->delete();
        

        return redirect('/faculties/'.$faculty);
    }
}
