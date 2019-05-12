@extends('master')

@section('content')

                <h3>Login Page</h3>
                <form method="POST" action="{{url('/login')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control form-app" value="{{old('email')}}" placeholder="Valid Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" class="form-control form-app" placeholder="Full Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-submit">Login</button>
                    </div>
                </form>
                <div class="text-danger">
                    @foreach($errors->all() aS $error)
                    {{$error}} <br>
                    @endforeach
                </div>
                

@endsection