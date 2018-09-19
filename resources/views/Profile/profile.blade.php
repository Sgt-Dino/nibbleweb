@include('layouts.top')

<!-- Profile -->          
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Profile Information</h4></div>
                    <div class="panel-body">
                    
                    <?php 
			        $restaurantadminid = Auth::id();				            
                    ?>

                
                                                               
                    <form method="post" action="{{ route('profile.profile.update', ['id' => $restaurantadminid]) }}">
                                                             
                                                                
					
                        @if(isset($profiles)) 
                        @foreach ($profiles as $prof) 
							@if($prof->id == $restaurantadminid)
											
						  <div class="form-group">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="PATCH">      
							<label>Restaurant Name</label>
						  <div>     
							<input type="text" readonly class="form-control" name="restaurantname" value={{$prof->restaurantname}}>
						  </div>      
						  </div>
						  
						  <div class="form-group">
							<label>Contact</label>
						  <div>
							<input type="number" name="phone" class="form-control" value={{$prof->phone}}>
						  </div>
						  </div>
						  
						  <div class="form-group">
						  <label>Email</label>
						  <div>
						  <input type="text" name="email" class="form-control" value={{$prof->email}}>
						  </div>
						  </div>
						  </br>

                          <div class="form-group">
						  <label>Restaurant Type</label>
						  <div>
						  <input type="text" name="restauranttype" class="form-control" value={{$prof->restauranttype}}>
						  </div>
						  </div>
						  </br>
						  
						  <div class="form-group">
							<label>Restaurant Address</label>
						  <div>
							<textarea name="addressline1" class="form-control" cols="1" rows="1" >{{$prof->addressline1}}</textarea>
						  </div>
						  </div>
						  </br>
                          
                          <div class="form-group">
                                <label>Suburb</label>
                                <select name="suburbid" class="form-control">
                                @foreach($subs as $suburb)
                                @if($prof->suburbid==$suburb->suburbid)
                                <option selected name="suburbid" value={{$suburb->suburbid}}>{{$suburb->suburbname}}</option>
                                @else
                                <option name="suburbid" value={{$suburb->suburbid}}>{{$suburb->suburbname}}</option>
                                @endif
                                @endforeach
                                </select>  
                                </div>                       
                            </br>
                          						  
                            <div class="form-group">
						  <label>Website</label>
						  <div>
						  <input type="text"  name="websiteurl" class="form-control" value={{$prof->websiteurl}}>
						  </div>
						  </div>
						  </br>
							@endif   
                        @endforeach
                        @endif
							<div class="form-group">
							<div></div>
							<button type="submit" class="btn btn-primary" rel="tooltip" title="Update profile">Update</button>
							</div>
							</form>

                
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

    <!-- geolocation -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

               
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Location</h4></div>
                    <div class="panel-body">

                    <div id="googleMap" style="width:100%;height:400px;"></div>
                    <script>
                    function myMap() {
                    var mapProp= {
                        center:new google.maps.LatLng(-33.9800224,25.552754100000016),
                        zoom:17,
                    };
                    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    }


                    </script>
                        <!--code used from www.w3schools.com HTML Geolocation API coordinates function-->
                        <p>Click the button to get your coordinates.</p>
                        <button class="btn btn-primary" rel="tooltip" title="Get your coordinates" onclick="getLocation()">Geolocate Me</button>
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
    </br>

<!-- upload logo -->  
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

               
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Upload Logo</h4></div>

                    <div class="panel-body">
                        
                    <button class="btn btn-primary" onclick="uploadLogo()">Upload</button>
                           
                    </div>
                </div>
            </div>
        </div>
    </div><!-- upload logo -->  
    
@include('layouts.bottom')