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

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

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
                <img class="img-responsive" src="../uploads/{{$post->url}}" alt="">
                <hr>
                @endif
                <p>{{$post->body}}</p>
                <a class="btn btn-primary" href="{{url('/posts',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
           
                <hr>
                @endforeach
                
                @if(Auth::check())
                @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
                <form action="{{url('/posts/store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" >
                    </div>
                     <div class="form-group">
                          <label for="category">Category</label>
                          <select class="form-control" id="category" name="category">
                              <option>select category...</option>
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>

                    <div class="form-group">
                      <label for="body">Body</label>
                      <textarea name="body" class="form-control" id="body" ></textarea>
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

                <div>
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