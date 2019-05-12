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
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
                <hr>
                @if($post->url)
                <img class="img-responsive" src="uploads/{{$post->url}}" alt="">
                <hr>
                @endif
                <p>{{$post->body}}</p>

                <div class="comments">
                    @foreach($post->comments as $comment)
                      <p class="comment">{{$comment->body}}</p>
                    @endforeach
                </div>
           
                <hr>
                @if($stopComment == 1)
                <h2 class="text-danger">Oops !! Comments are Currently Closed..</h2>
                @else
                <form action="{{url('/posts/'.$post->id.'/store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="body">Write something...</label>
                      <textarea name="body" class="form-control" id="body" required></textarea>
                    </div>                      

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
                @endif
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