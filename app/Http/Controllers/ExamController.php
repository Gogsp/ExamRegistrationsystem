<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Exam;

class ExamController extends Controller
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
        $request->validate([
            'date'=>'required',
        ]);

        $course = Course::find($request->input('courseId'));

        $dateNow = date('Y-m-d');

        $exam = Exam::make([
            'date' => $request->input('date'),
        ]);
        if($exam->date < $dateNow){
            $exam->completed = 1;
        }else{
            $exam->completed = 0;
        }
        $exam->course_id = $course->id;
        $exam->save();
        

        return redirect('/courses/'.$course->id);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        $course = Course::find($exam->course_id);
        return view('exams.edit',['exam'=>$exam,'course'=>$course]);
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
            'date'=>'required',
        ]);

        $dateNow = date('Y-m-d');

        $exam = Exam::where('id',$id)
        ->update([
            'date' => $request->input('date'),
        ]);
        $exam = Exam::find($id);
        $course = Course::find($exam->course_id);
        if($exam->date < $dateNow){
            $exam->completed = 1;
        }else{
            $exam->completed = 0;
        }
        $exam->course_id = $course->id;
        $exam->save();
        

        return redirect('/courses/'.$course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $course_id= $exam->course_id;

        $exam->delete();
        

        return redirect('/courses/'.$course_id);
    }
}
