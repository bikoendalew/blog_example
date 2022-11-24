<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
   /* public function __construct(){
        $this->middleware(['auth']);
    }*/
    public function index(){
        $posts=Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(2);   

        return view('post.index',[
            'posts'=>$posts
        ]);
    }


    public function store(Request $request){
    $this->validate($request,[
      'body' =>'required'
    ]);
$request->user()->posts()->create([
    'body'=>$request->body
]);
 return back();
    }
    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return back()->with('status','Deleted Succesfull');
    }
}
