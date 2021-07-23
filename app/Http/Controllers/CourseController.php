<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $department = Department::find($request->input('deptid'));

        $request->validate([
            'name'=>'required',
        ]);

        $course = Course::make([
            'name' => $request->input('name'),
        ]);
        $course->department_id = $department->id;
        $course->save();
        

        return redirect('/departments/'.$department->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id); 
        $dept_id = $course->department_id;
        $department = Department::find($dept_id);
        $exams = $course->getExams;
    
        return view('courses.show',['course'=>$course,'department'=>$department,'exams'=>$exams]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $dept_id = $course->department_id;
        $department = Department::find($dept_id);
        return view('courses.edit',['course'=>$course,'department'=>$department]);
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

        $dept_id = $request->input('deptId');
        $department = Department::find($dept_id);
        $course = Course::where('id',$id)
        ->update([
            'name' => $request->input('name'),
        ]);
      


        return redirect('/departments/'.$department->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $course = Course::find($id);
        $dept_id= $course->department_id;

        $course->delete();
        

        return redirect('/departments/'.$dept_id);
        //
    }
}
