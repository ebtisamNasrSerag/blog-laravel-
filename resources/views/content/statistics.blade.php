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
                    Statistics
                    <small>Webesite Statistics</small>
                </h1>

        <div>
            <table class="table table-hover">
                <tr>
                    <th>All Users</th>
                    <th>{{$statistics['users']}}</th>
                </tr>
                <tr>
                    <th>All Posts</th>
                    <th>{{$statistics['posts']}}</th>
                </tr>
                <tr>
                    <th>All Comments</th>
                    <th>{{$statistics['comments']}}</th>
                </tr>
                <tr>
                    <th>Most Active User</th>
                    <th><b>{{$statistics['active_user']}}</b>
                        ,Likes[{{$statistics['active_user_likes']}}]
                        ,Comments[{{$statistics['active_user_comments']}}]
                    </th>
                </tr>
                <tr>
                    <th>Most Active Post</th>
                    <th>{{$statistics['most_active_post']}}</th>
                </tr>
                
            </table>
        </div>

@endsection