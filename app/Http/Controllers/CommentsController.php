<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store($id)
    {
    	if(Auth::user()){
    	$comment = new Comment;
    	$comment->body = request('body');
    	$comment->post_id = $id;
    	$comment->user_id = Auth::user()->id;

    	$comment->save();

    	 return back();
    	}else{
    		return view('/login');
    	}
    }
}
