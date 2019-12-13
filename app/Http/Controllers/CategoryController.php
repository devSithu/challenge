<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categoty=Category::orderBy('id','desc')->get();
        return view('category.addCategory',compact('categoty'));
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
        $file=$request->file('photo');
           $filename=uniqid().'_'.$file->getClientOriginalName();
    
           $file->move(public_path().'/uploads/',$filename);
           
           Category::create([
               'name'=>$request->get('name'),
               'photo'=>$filename
           ]);
           return redirect('/category')->with('status','success');
    }


    public function storeCategory(Request $request){
        $file=$request->file('photo');
        $filename=uniqid().'_'.$file->getClientOriginalName();
 
        $file->move(public_path().'/uploads/',$filename);
        
        Category::create([
            'name'=>$request->get('name'),
            'photo'=>$filename
        ]);
        return redirect('/product')->with('status','success');
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Category::find($id);
        $post->delete();
        
        return redirect('category');
    }

   
}
