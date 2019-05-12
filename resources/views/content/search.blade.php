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
                    Search Result
                </h1>
                <!-- First Blog Post -->
                @forelse($posts as $post)
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
                
                
                <hr>
                @empty

                <p class="lead">
                   No Matched Result...
                </p>

                @endforelse
             
                 
              
               

@endsection