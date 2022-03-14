<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts=Post::all();
        return view('home',['posts' => $posts]);
    }

    public function create()
    {
        
        return view('createPost');
    
    }
    public function store(Request $request)
    {       
         
            Post::create([
            'title' => $request->data['title'],
            'description' => $request->data['description'],
            'user_id'  => auth()->user()->id
        ]);
        return response(' ',200);  
    }
    public function userspost()
    {   $userId=Auth::id();
        $userPosts=User::find($userId)->posts;
        return view('userposts',['userPosts' => $userPosts]);
    }
    public function updatepost(Request $request , Post $post)
    {
        //  dd($request->all());
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|max:255|string'
            ]);
            $post->update([
                'title' => $request->data['title'],
                'description' => $request->data['description'],
            ]);
            // $post->update($request->all());
            
            return response(' ',200);
        } catch (\Exception $e) {
            info($e);
        }
    
    }
    public function destroy(Post $id){
        
        $id->delete();

        return response(' ',200);
    
    }

    public function show($id){
        
        $details=Post::with('comments')->find($id);
        
        return view('details',['details' => $details]);
    }

    public function poststatus(Request $request,$id)
    {   
        $postStatus = Post::find($id);
        
        //dd($postStatus);

        $postStatus->status = "public";

        $postStatus->save();

        return response(' ',200);
       
    }
    public function statusprivate(Request $request,$id)
    {
        $postStatus = Post::find($id);
        
        //dd($postStatus);

        $postStatus->status = "private";

        $postStatus->save();

        return response(' ',200);
    }
}
