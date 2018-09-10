<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Nibble</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style4.css">

  
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Nibble</h3>
                    <strong>N</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="home">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                        
                    </li>
                    <li>
                        <a href="booking">
                            <i class="glyphicon glyphicon-calendar"></i>
                            Bookings
                        </a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="	glyphicon glyphicon-stats"></i>
                            Reports
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Customer reports</a></li>
                            <li><a href="#">Status Reports</a></li>
                            <li><a href="#">Other Reports</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-cutlery"></i>
                            Menu
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="food"><i class="glyphicon glyphicon-apple"></i>Food</a></li>
                            <li><a href="category"><i class="glyphicon glyphicon-tags"></i>Category</a></li>	
                            <li><a href="specials"><i class="glyphicon glyphicon-shopping-cart"></i>Special</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile">
                            <i class="glyphicon glyphicon-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            FAQ
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Help</a></li>
                </ul>
            </nav>



            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">-</a></li>
                                @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                     </form>
                                    </li>
                                @endif                                                                                             
                            </ul>
                        </div>

                        
                    </div>
                </nav>

<!-- category -->            
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Menu Categories</div>

                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            
                            @foreach($category as $cat)
                                <tr>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->description}}</td>
                                  
                                    <td align="center">
                                    <a href=#><button class="btn btn-sm btn-primary">Edit</button></a>
                                    </td>
                                    <td align="center">
                                    <form action=# method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                                   
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>                                   
                                    </form>
                                            
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- food -->  
                

<p style="visibility:hidden">This application is to be used by authrized Nibble users only. Nibble is the sole property of Skedaddle. Please contact Skedaddle for more information regarding Nibble and the use therof. The use of this application does not amdit you the right to edit or change it as you wish.</p>     
               
            </div>
        </div>


        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>

