@extends('master')
@section('categories')
  @foreach($categories as $category)
    <div class="col-lg-6">
        <ul class="list-unstyled">
            <li><a href="{{url('/category',$category->name)}}">{{$category->name}}</a>
            </li>
            
        </ul>
    </div>
    @endforeach
  @endsection

@section('content')

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                @foreach($posts as $post)
                <h2>
                    <a href="{{url('/posts',$post->id)}}">{{$post->title}}</a>
                </h2>
                <!-- <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p> -->

                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
                <hr>
                @if($post->url)
                <img class="img-responsive" src="uploads/{{$post->url}}" alt="">
                <hr>
                @endif
                <p>{{$post->body}}</p>
                <a class="btn btn-primary" href="{{url('/posts',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                @php

                  $like_count =0;
                  $dislike_count =0;

                  $like_status = "btn-secondry";
                  $dislike_status = "btn-secondry";
                
                foreach($post->likes as $like)
                {
                  if($like->like == 1)
                  {
                    $like_count++;
                  }

                  if($like->like == 0)
                  {
                    $dislike_count++;
                  }
                  if(Auth::check())
                  {
                    if($like->user_id == Auth::user()->id && $like->like == 1)
                        $like_status = "btn-success";
                    if($like->user_id == Auth::user()->id && $like->like == 0)
                        $dislike_status = "btn-danger";
                      
                   }
                }  
                @endphp
                
                    <button  type="button" data-postId="{{$post->id}}_l" data-like="{{$like_status}}" class="like btn {{$like_status}}" @if(!Auth::user()) onclick="alert('you should login first')" @endif>Like <span class="glyphicon glyphicon-thumbs-up"></span> 
                        <span class="like_count"><b>{{$like_count}}</b></span></button>
                    <button type="button" data-postId="{{$post->id}}_d"  data-like="{{$dislike_status}}"  class="dislike btn {{$dislike_status}}" @if(!Auth::user()) onclick="alert('you should login first')" @endif>Dislike <span class="glyphicon glyphicon-thumbs-down"></span> 
                        <span class="dislike_count"><b>{{$dislike_count}}</b></span></button>
                
                <hr>
                @endforeach

                @if(Auth::check())
                @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
                    <form action="{{url('/posts/store')}}" method="POST" enctype="multipart/form-data">
                    	{{csrf_field()}}
    					<div class="form-group">
    					  <label for="title">Title</label>
    					  <input type="text" name="title" class="form-control" id="title" required="required">
    					</div>

              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">select category...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
              </div>

    					<div class="form-group">
    					  <label for="body">Body</label>
    					  <textarea name="body" class="form-control" id="body" required="" ></textarea>
    					</div>

    					<div class="form-group">
    					  <label for="url">Image</label>
    					  <input type="file" name="url" class="form-control" id="url">
    					</div>

    					<div class="form-group">
    					  <button type="submit" class="btn btn-primary">Add Post</button>
                          
    					</div>
    				 </form>
                @endif     
                @endif     


				<div class="text-danger">
					@foreach($errors->all() aS $error)
					{{$error}} <br>
					@endforeach
				</div>
                
                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

@endsection