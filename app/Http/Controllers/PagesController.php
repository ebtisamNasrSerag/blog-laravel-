<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Role;
use App\Category;
use App\Like;
use DB;

class PagesController extends Controller
{
    public function posts()
    {
        $posts = Post::all();
    	$categories = Category::all();
    	return view('content.posts',compact('posts','categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $posts = Post::where('title','LIKE','%'.$request->search."%")->get();

        return view('content.search',compact('posts','categories'));
    }

    public function post(Post $post)
    {  
        $stopComment = DB::table('settings')->where('name','stop_comment')->value('value');
        $categories = Category::all();
    	return view('content.post',compact('post','stopComment','categories'));
    }

    public function store()
    {
    	$this->validate(request(),[
               'title' => 'required',
               'category' => 'required',
               'body' => 'required',
               'url' => 'image|mimes:jpg,jpeg,gif,png|max:2048',
    
    	]);


    	$post = new Post;
    	$post->title = request('title');
        $post->cat_id = request('category');
    	$post->body = request('body');
        if(request()->url)
        {
        $imageName = time().'.'.request()->url->getClientOriginalExtension();
        request()->url->move(public_path('uploads'), $imageName);
    	$post->url = $imageName;
        }else{
            $post->url = '';
        }

        $post->save();

        return redirect('/posts');
    }

    public function addCategory(Request $request)
    {
        $validator = $this->validate(request(),[
               'name' => 'required',
               'desc' => 'required',
        ]);

        $category = new Category;
        $category->name = $request['name'];
        $category->desc = $request['desc'];
        $category->save();
        $json = array(
            'success' => 'Category Added Successfully',
        );

        return response()->json($json, 200);
        
    }

    public function category($name)
    {
        $category = DB::table('categories')->where('name' , $name)->value('id');
        $posts = DB::table('posts')->where('cat_id' , $category)->get();

        $categories = Category::all();
        return view('content.category',compact('posts','categories'));
    }


    public function admin()
    {
        $users = User::all();
        $categories = Category::all();

        $stopComment = DB::table('settings')->where('name','stop_comment')->value('value');
        $stopRegister = DB::table('settings')->where('name','stop_register')->value('value');
        return view('content.admin',compact('users','stopComment','stopRegister','categories'));
    }

    public function settings(Request $request)
    {
        if($request->stop_comment)
        {
            DB::table('settings')->where('name','stop_comment')
                        ->update(['value' => 1]);
        }else{
            DB::table('settings')->where('name','stop_comment')
                        ->update(['value' => 0]);
        }

        if($request->stop_register)
        {
            DB::table('settings')->where('name','stop_register')
                        ->update(['value' => 1]);
        }else{
            DB::table('settings')->where('name','stop_register')
                        ->update(['value' => 0]);
        }
        return redirect()->back();
    }

    public function addRole(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach(); 

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','user')->first());
        }
        if($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','editor')->first());
        }
        if($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','admin')->first());
        }
        return redirect()->back();
    }

    public function accessDenied()
    {

        return view('content.access_denied');
    }

    public function like(Request $request)
    {
        $likes = $request->likes;
        $post_id = $request->post_id;
        $like = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
        $change_like = 0;
        if(!$like)
        {
            $new_like = new Like;
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();

            $is_like = 1;

        }elseif($like->like == 1)
        {
            DB::table('likes')->where('post_id',$post_id)
                              ->where('user_id',Auth::user()->id)
                              ->delete(); 
            $is_like = 0;

        }elseif($like->like == 0)
        {
            DB::table('likes')->where('post_id',$post_id)
                              ->where('user_id',Auth::user()->id)
                              ->update(['like'=> 1]); 
            $is_like = 1;
            $change_like = 1;

        }
        $response = array(
            'is_like'     => $is_like,
            'change_like' => $change_like,
        );

        return response()->json($response,200);
    }

    public function dislike(Request $request)
    {
        $likes = $request->likes;
        $post_id = $request->post_id;
        $dislike = DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
        
        $change_dislike = 0;
        if(!$dislike)
        {
            $new_like = new Like;
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 0;
            $new_like->save();
            
            $is_dislike = 1;


        }elseif($dislike->like == 0)
        {
            DB::table('likes')->where('post_id',$post_id)
                              ->where('user_id',Auth::user()->id)
                              ->delete(); 
            $is_dislike = 0;

        }elseif($dislike->like == 1)
        {
            DB::table('likes')->where('post_id',$post_id)
                              ->where('user_id',Auth::user()->id)
                              ->update(['like'=> 0]); 
            $is_dislike = 1;
            $change_dislike =1;
        }
        $response = array(
            'is_dislike' => $is_dislike,
            'change_dislike'=> $change_dislike,
        );

        return response()->json($response,200);
    }

    public function statistics()
    {
        $users = DB::table('users')->count();
        $posts = DB::table('posts')->count();
        $comments = DB::table('comments')->count();
        $categories = Category::all();
       //get user has most comments first then likes 
        $most_comments = User::withCount('comments')
                               ->orderBy('comments_count','desc')->first();

        $likes_count = DB::table('likes')->where('user_id',$most_comments->id)->count();
        $total_comms_likes_user1 = $most_comments->comments_count + $likes_count;                      
        //get user has most likes first then comments
        $most_likes = User::withCount('likes')
                               ->orderBy('likes_count','desc')->first();

        $comments_count = DB::table('comments')->where('user_id',$most_likes->id)->count();
        $total_likes_comms_user2 =  $most_likes->likes_count + $comments_count;

        // compare between 2 users 
        if($total_comms_likes_user1  > $total_likes_comms_user2 )
        {
            $active_user = $most_comments->name;
            $active_user_likes = $likes_count;
            $active_user_comments = $most_comments->comments_count; 
        } else{
            $active_user = $most_likes ->name;
            $active_user_likes = $most_likes->likes_count ;
            $active_user_comments = $comments_count;
        }

        //most active post
        $most_post = Post::withCount('comments')
                               ->orderBy('comments_count','desc')->first();
        $most_active_post = $most_post->title;
        $statistics = array(
            'users' => $users,
            'posts' => $posts,
            'comments' => $comments,
            'active_user' => $active_user,
            'active_user_likes' => $active_user_likes,
            'active_user_comments' => $active_user_comments,
            'most_active_post'     => $most_active_post,
            
        );

        return view('content.statistics',compact('statistics','categories'));
    }

    
}
