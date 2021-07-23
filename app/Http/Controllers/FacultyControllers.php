<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Faculty;

class FacultyControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();
        $faculties = Faculty::all();

        return view('faculties.index')->with('universities',$universities,'faculties',$faculties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $university = University::find($request->input('uniid'));

        $request->validate([
            'name'=>'required',
        ]);
        

        $faculty = Faculty::make([
            'name' => $request->input('name'),
        ]);
        $faculty->uni_id = $university->id;
        $faculty->save();
        

        return redirect('/universities/'.$university->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::find($id);
        $uni_id = $faculty->uni_id;
        $university = University::find($uni_id);
        return view('faculties.show',['faculty'=>$faculty,'university'=>$university]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('faculties.edit',['faculty'=>$faculty]);
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
        $uni_id = $request->input('uniId');
        $university = University::find($uni_id);

        $faculty = Faculty::where('id',$id)
        ->update([
            'name' => $request->input('name'),
        ]);

        return redirect('/universities/'.$university->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        $uni_id = $faculty->uni_id;

        $faculty->delete();
        

        return redirect('/universities/'.$uni_id);
    }
}
