<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\News;

class NewsController extends Controller
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
       
          // Request Validation 
        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'uniId'=>'required'
        ]);
        
        $newImageName = time().$request->uniId.'-'.$request->title.'-.'.$request->image->extension();
        
       
        $request->image->move(public_path('images/newsImages'),$newImageName);
        $uniId = $request->input('uniId'); 
        $university = University::find($uniId); 
        
        $news = News::make([
            'title' => $request->input('title'),
            'details'=>$request->input('desc'),
            'image' =>$newImageName,                
        ]);
        $news->uni_id = $university->id;
        $news->save();
        
       
      
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
