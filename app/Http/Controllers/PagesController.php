<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PagesController extends Controller
{
    public function home(){
        $posts = Post::all();
        return view('home')->with('posts', $posts);
    }

    public function random(){
        $user_id = auth()->user()->id;
        $posts = User::find($user_id)->posts;
        return view('random')->with('posts', $posts);
    }

    public function personal(){
        $user_id = auth()->user()->id;
        $posts = User::find($user_id)->posts;
        return view('personal')->with('posts', $posts);
    }

    // public function personal(){
    //     $posts = Post::orderBy('id','asc')->paginate(3);
    //     return view('personal')->with('posts', $posts);
    // }
}
