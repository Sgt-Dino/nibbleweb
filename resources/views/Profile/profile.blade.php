
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




<!-- Profile -->          
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

               
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Profile Information</h4></div>

                    <div class="panel-body">
					<?php 
			        $restaurantadminid = Auth::id();				            
                    ?>
                        @if(isset($profiles)) 
                        @foreach ($profiles as $prof) 
							@if($prof->id == $restaurantadminid)
											
						  <div class="form-group">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="PATCH">      
							<label>Restaurant Name</label>
						  <div>     
							<input type="text" readonly class="form-control" name="name" value={{$prof->restaurantname}}>
						  </div>      
						  </div>
						  
						  <div class="form-group">
							<label>Contact</label>
						  <div>
							<input type="number" name="contact" class="form-control" value={{$prof->phone}}>
						  </div>
						  </div>
						  
						  <div>
						  <label>Email</label>
						  <div>
						  <input type="text"  name="email" class="form-control" value={{$prof->email}}>
						  </div>
						  </div>
						  </br>
						  
						  <div>
							<label>Restaurant Address</label>
						  <div>
							<textarea name="address" class="form-control" cols="1" rows="1" >{{$prof->addressline1}}</textarea>
						  </div>
						  </div>
						  </br>
						  
						  <div>
						  <label>Suburb</label>
						  <div>
						  <input type="text"  name="suburb" class="form-control" value={{$prof->suburbid}}>
						  </div>
						  </div>
						  </br>
						  
						  <div>
						  <label>Website</label>
						  <div>
						  <input type="text"  name="website" class="form-control" value={{$prof->websiteurl}}>
						  </div>
						  </div>
						  </br>
							@endif   
                        @endforeach
                        @endif
							<div class="form-group">
							<div></div>
							<button type="submit" class="btn btn-primary">Update</button>
							</div>
							</form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- geolocation -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

               
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Location</h4></div>

                    <div class="panel-body">

                    <div id="googleMap" style="width:100%;height:400px;"></div>

                    <script>
                    function myMap() {
                    var mapProp= {
                        center:new google.maps.LatLng(-33.9800224,25.552754100000016),
                        zoom:5,
                    };
                    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    }


                    </script>

                        <!--code used from www.w3schools.com HTML Geolocation API coordinates function-->
                        <p>Click the button to get your coordinates.</p>

                        <button class="btn btn-primary" rel="tooltip" title="Provides location coordinates " onclick="getLocation() ">Geolocate Me</button>

                        <!-- tooltip -->
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $("[rel=tooltip]").tooltip({ placement: 'top'});
                            });
                        </script>
                        <!-- tooltip -->

                        <p id="demo"></p>

                        <script>
                        var x = document.getElementById("demo");

                        function getLocation() {
                        if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                        } else { 
                        x.innerHTML = "Geolocation is not supported by this browser.";
                        }
                        }

                        function showPosition(position) {
                        x.innerHTML = "Latitude: " + position.coords.latitude + 
                        "<br>Longitude: " + position.coords.longitude;
                        }
                        </script>

                        
                           


                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- upload logo -->  
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

               
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Upload Logo</h4></div>

                    <div class="panel-body">
                        
                    <button class="btn btn-primary" onclick="uploadLogo()">Upload</button>
                           
                    </div>
                </div>
            </div>
        </div>
    </div><!-- upload logo -->  
    
    
    
    
    <!-- profile -->  
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
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH5nbLi84BB3QcgwUe-0lMgQZon2C_sB4&callback=myMap"></script>
    </body>
</html>
