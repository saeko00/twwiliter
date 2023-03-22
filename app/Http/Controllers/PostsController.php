<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


     //投稿されたタイムラインの表示
    public function index(){
       $timeline = DB::table('posts')
       ->join('users','posts.user_id','=','users.id')
       ->select('posts.id', 'posts.user_id','posts.posts','posts.created_at')
       ->get();
        return view('posts.index',['timeline'=>$timeline]);
    }

    //投稿
    public function create(Request $request)
    {
        $user = Auth::id();
        $post = $request->input('newTweet');
        DB::table('posts')->insert([
            'user_id' => $user,
            'posts' => $post,
            'created_at' => now()
        ]);
        return redirect('/top');
    }
