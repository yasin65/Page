<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	if($request->has('search')){
    		$posts = Post::search($request->get('search'))->get();	
    	}else{
    		$posts = Post::get();
    	}
        return view('website.post1', compact('posts'));
    }
}
