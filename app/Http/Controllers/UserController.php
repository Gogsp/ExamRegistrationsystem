<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\StudentExam;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\User;


class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginCheck(Request $request){
        $userInfo = User::where('email','=',$request->email)->first();
        //dd($userInfo->user_type);

        if(!$userInfo){
            return back()->with('fail', 'No such email');
        }else{
            if($request->password == $userInfo->password){
                session(['userId'=>$userInfo->user_type,'userIdd'=>$userInfo->id]);
                return redirect('/users/'.$userInfo->id);
            }else{
                return back()->with('fail', 'Incorrect Password'); 
            }
        }
    }

    public function logout(Request $request){
        session()->forget(['userId']);
        return redirect('/login');
    }

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
    public function createStudent($fid)
    {
      
        $faculty = Faculty::find($fid);
        $users = User::where('fac_id','=',$fid)->get();

        return view('user.register',[
            'faculty'=> $faculty,
            'users'=>$users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Request Validation 
         $request->validate([
            'fullname'=>'required',
            'indexNo'=>'required',
            'email'=>'required',
            'pwd'=>'required',
            'deptId'=>'required',
            'image_path'=>'required|mimes:png,jpg,jpeg'
        ]);

        $newImageName = $request->deptId.'-'.$request->indexNo.'-.'.$request->image_path->extension();
        
        $request->image_path->move(public_path('images/studentImages'),$newImageName);

        $department = Department::find($request->input('deptId'));

        $user = User::make([
            'name' => $request->input('fullname'),
            'index_no'=>$request->input('indexNo'),
            'email'=>$request->input('email'),
            'image_path' =>$newImageName,
            'password' => $request->input('pwd'),
            'dept_id'=>$request->input('deptId')
            
        ]);

        $fac = $department->getFaculty();
        $uni = University::find($fac->uni_id);
        $user->fac_id = $fac->id;

        $user->uni_id = $uni->id;
        $user->save();

        return redirect('/users/create/'.$fac->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        $examsId = array();
        $appliedExams = $user->getAppliedExams();
        
        foreach($appliedExams as $exam){
            array_push($examsId,$exam->exam_id);
        }
     
        
        $fac_id = $user->fac_id;
        $dept_id = $user->dept_id;
        $department = Department::find($dept_id);
        $faculty = Faculty::find($fac_id);
       
        
        return view('user.show',['user'=>$user,'faculty'=>$faculty,'department'=>$department,'examsId'=> $examsId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $faculty = Faculty::find($user->fac_id);
        return view('user.edit',['user'=>$user,'faculty'=>$faculty]);
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
         // Request Validation 
         $request->validate([
            'fullname'=>'required',
            'indexNo'=>'required',
            'email'=>'required',
            'pwd'=>'required',
            'deptId'=>'required',
            'image_path'=>'required|mimes:png,jpg,jpeg'
        ]);

        $newImageName = $request->uniId.'-'.$request->facId.'-'.$request->deptId.'-'.$request->indexNo.'-.'.$request->image_path->extension();
        
        $request->image_path->move(public_path('images/studentImages'),$newImageName);

        $department = Department::find($request->input('deptId')); 

        $fac = $department->getFaculty();
        $uni = University::find($fac->uni_id);
       
        
        $user = User::where('id',$id)
        ->update([
            'name' => $request->input('fullname'),
            'index_no'=>$request->input('indexNo'),
            'email'=>$request->input('email'),
            'image_path' =>$newImageName,
            'password' => $request->input('pwd'),
            'dept_id'=>$request->input('deptId'),
            'fac_id'=>$fac->id,
            'uni_id'=>$uni->id
            
        ]);

        return redirect('/users/create/'.$fac->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->first();
        $user->delete();
        return redirect('/users/create/'.$user->fac_id);
    }
}
