<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/blog-home.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="{{url('/posts')}}">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li>
                        <a href="#">About</a>
                    </li> -->
                    <li>
                        <a href="{{url('/statistics')}}">Statistics</a>
                    </li>
                    @if(Auth::check())
                      @if(Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{url('/admin')}}">admin</a>
                        </li>
                      @endif
                        <li>
                            <a>Welcome : {{Auth::user()->name}}</a>
                        </li>
                        <li>
                           <a href="{{url('/logout')}}">Logout</a>
                        </li>
                    @else
                        <li>
                           <a href="{{url('/register')}}">Register</a>
                        </li> 
                        <li>
                           <a href="{{url('/login')}}">Login</a>
                        </li>    
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="POST" action="{{url('/search')}}">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" class="form-control search" name="search" required="">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        @yield('categories')
                        <!-- /.col-lg-6 -->
                       @if(Auth::check())
                       @if(Auth::user()->hasRole('Admin'))
                        <div class="text-center">
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Category</button>
                        </div>
                        @endif
                        @endif
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('/add-category')}}" method="POST" class="form">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div id="form-results"></div>
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name"  placeholder="Enter Category Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <input type="text" class="form-control" id="desc"  placeholder="Enter Category Description" name="desc" >
                            </div>
                            <button class="btn btn-info submit-btn">Add category</button>
                        </form>    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
                    
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2019</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/like.js') }}"></script>
    <script >
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>
    <script >
        var url = "{{route('like')}}";
        var url_d = "{{route('dislike')}}";
        var token = "{{Session::token()}}";


        $(document).on('click', '.submit-btn', function(){
        
        btn = $(this);
        form = btn.parents('.form');

        url  = form.attr('action');
        data = new FormData(form[0]);


        formResults = form.find('#form-results');
        $.ajax({
                url : url,
                type : 'POST',
                data : data,
                dataType : 'json',
                
                success : function(results){
                   
                    formResults.removeClass().addClass('alert alert-success').html(results.success);
                    $(".form")[0].reset();
                    
                }, 
                error: function(results){
                    if(results.status === 422) {
                    var errors = results.responseJSON;
                    $.each(results.responseJSON, function (key, value) {
                        var name ='';
                        var desc = '';
                        if(value['name'] != null){
                            var name = value['name'];
                        }if(value['desc'] != null)
                        {
                            var desc = value['desc'];
                        }

                        formResults.removeClass().addClass('alert alert-danger').html(name + '<br>' + desc );

                    });
                    }     
                 },
                cache : false,
                processData : false,
                contentType : false,
            });
        return false;
    });
    </script>

</body>

</html>
