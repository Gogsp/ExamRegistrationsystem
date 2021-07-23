<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;



class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();

        return view('universities.index',['universities'=>$universities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universities.create');
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
            'uniname'=>'required',
            'desc'=>'required',
            'logo_path'=>'required|mimes:png,jpg,jpeg'
        ]);

        $newLogoName = time().'-'.$request->uniname.'-.'.$request->logo_path->extension();
        
        $request->logo_path->move(public_path('images/universityLogo'),$newLogoName);

        $university = University::create([
            'name' => $request->input('uniname'),
            'description'=>$request->input('desc'),
            'logo' =>$newLogoName
        ]);

        return redirect('/universities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::find($id);
        $news = $university->getNews();
        return view('universities.show',['university'=>$university,'news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);
        return view('universities.edit',['university'=>$university]);
       
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
            'uniname'=>'required',
            'logo_path'=>'mimes:png,jpg,jpeg',
            'desc'=>'required'
        ]);

        $newLogoName = time().'-'.$request->uniname.'-.'.$request->logo_path->extension();
        
        $request->logo_path->move(public_path('images/universityLogo'),$newLogoName);


        $university = University::where('id',$id)
        ->update([
            'name' => $request->input('uniname'),
            'logo' =>$newLogoName,
            'description' => $request->input('desc')
        ]);

        return redirect('/universities/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::find($id)->first();

        $university->delete();

        return redirect('/universities');
    }
}
