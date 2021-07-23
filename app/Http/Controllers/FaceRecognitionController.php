<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentExam;

class FaceRecognitionController extends Controller
{
    public function studentData(Request $request, $id, $e_id) { 

        $user = User::where('index_no','=',$id)->get();
        $length = sizeof($user);
        if($length>0){
            $user = $user[0];
            $exam = StudentExam::where([['student_id', '=', $user->id],
            ['exam_id', '=',$e_id]])->get();
            $length_exam = sizeof($exam);
            if($length_exam>0){
                $student = [ 
                    "Name" => $user->name, 
                    "Reg_No" => $user->id, 
                    "Index_No" => $user->index_no, 
                    "Faculty" => $user->getDepartment()->getFaculty()->name, 
                    "Department" => $user->getDepartment()->name, 
                    "image" => $user->image_path,
                    "student_exam_id" => $exam[0]->id ]; 
                    
                    return response()->json($student, 200); 
            }else{
                $student = [ 
                    "Name" => "", 
                    "Reg_No" => "", 
                    "Index_No" => "", 
                    "Faculty" => "", 
                    "Department" => "", 
                    "image" => "" ]; 
                    
                    return response()->json($student, 400); 
            }
       
           
        }else{

            $student = [ 
                "Name" => "", 
                "Reg_No" => "", 
                "Index_No" => "", 
                "Faculty" => "", 
                "Department" => "", 
                "image" => "" ]; 
                
                return response()->json($student, 400); 
        }
       
    }

    public function markAttendance(Request $request, $id){
        $exam = StudentExam::findOrFail($id);
        $exam->attandance = 1;
        $exam->save();

        return response('success');
    }
}
