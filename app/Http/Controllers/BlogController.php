<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
        public function index()
    {
        $blogs = Blog::all();
        return view('blog.index',compact('blogs'));
    }

    public function create()
    { 
        return view('blog.new');
    }

    public function store(Request $request){
        
        $blog         		= new Blog();
        $blog->titre 		= $request->titre;        
        $blog->description  = $request->description;        
        $blog->image 	 	= $request->image;       
        $blog->user_id 		= $request->user_id;           
        $blog->save();

        return redirect('/blogs');
    }

    public function edit($id){

        $blog = Blog::find($id);
        return view('blog.edit',['blog'=>$blog]);
    }
    
    public function update(Request $request){
        
        $blog 				= Blog::find($id);        
        $blog->titre 		= $request->titre;        
        $blog->description  = $request->description;        
        $blog->image 	 	= $request->image;       
        $blog->user_id 		= $request->user_id;       
        $blog->save();

        return redirect('/blogs');
    }

    public function destroy(Request $request,$id){

        $blog = Blog::find($id);
        $blog->delete();

        return redirect('/blogs');
        
    }
}