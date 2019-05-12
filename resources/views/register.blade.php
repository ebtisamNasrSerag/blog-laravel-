@extends('master')

@section('content')

                <h3>Create a New User</h3>
                @if($stopRegister == 1)
                <h2 class="text-danger">Oops !! Registration is Currently Closed..</h2>
                @else
                <form method="POST" action="{{url('/register')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" class="form-control form-app" value="{{old('name')}}" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control form-app" value="{{old('email')}}" placeholder="Valid Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" class="form-control form-app" placeholder="Full Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-submit">Sign Up</button>
                    </div>
                </form>
                @endif

@endsection