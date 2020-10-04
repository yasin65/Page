<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
use App\Contact;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function yasin(){
        return view('index');
    }
    public function index(){
        $posts=Post::with('category')->orderBy('created_at','DESC')->take(5)->get();
        $fpost2=$posts->splice(0,2);
        $mpost1=$posts->splice(0,1);
        $lpost2=$posts->splice(0);

        $recentposts=Post::with('category')->orderBy('created_at','DESC')->paginate(3);

    	return view('website.home',compact(['posts','recentposts','fpost2','mpost1','lpost2']));
    }
    public function post($slug){
        $post = Post::with('category')->where('slug', $slug)->first();
        $posts = Post::with('category')->inRandomOrder()->limit(3)->get();

        // More related posts
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        $categories = Category::all();
        $tags = Tag::all();

        if($post){
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstRelatedPost', 'firstRelatedPosts2', 'lastRelatedPost']));
        }else {
            return redirect('/');
        }
    }
    public function about(){
    	return view('website.about');
    }
     public function category($slug){
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }
   public function tag($slug){
        $tag = Tag::where('slug', $slug)->first();
        if($tag){
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);

            return view('website.tag', compact(['tag', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }
}
