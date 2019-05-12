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

        <h2>Control Panel</h2>
        <h4>List of Users</h4>

        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Editor</th>
                    <th>Admin</th>
                </tr>
            @foreach($users as $user) 
             <form method="POST" action="{{url('/add-role')}}"> 
                {{csrf_field()}}
                <input type="hidden" name="email" value="{{$user->email}}">
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <input type="checkbox" name="role_user" onchange="this.form.submit()" {{$user->hasRole('User')? 'checked' :''}}>
                    </td>
                    <td>
                        <input type="checkbox" name="role_editor" onchange="this.form.submit()" {{$user->hasRole('Editor')? 'checked' :''}}>
                    </td>
                    <td><input type="checkbox" name="role_admin" onchange="this.form.submit()" {{$user->hasRole('Admin')? 'checked' :''}}>
                    </td>

                </tr>
             </form>    
            @endforeach    
            </table>
        </div>

        <div>
            <h4>Settings</h4>
            <form action="{{url('/settings')}}" method="POST">
                {{csrf_field()}}
                Stop Comment : <input type="checkbox" name="stop_comment" onchange="this.form.submit()" {{$stopComment == 1 ? 'checked' :''}}>
                <br>
                Stop Register : <input type="checkbox" name="stop_register" onchange="this.form.submit()" {{$stopRegister == 1 ? 'checked' :''}}>
            </form>
        </div>

@endsection