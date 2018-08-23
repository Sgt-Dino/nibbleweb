<!-- Profile -->  
<div class="panel panel-default">
                <div class="panel-heading">Restaurant Information</div>

                <div class="panel-body">
                {!! Form::open(array('action' => array('profileController@update', $profile->restaurantid))) !!}
                                                               
                <form method="post" action="{{ route('profile.profile.update', ['id' => $profile->restaurantid]) }}">

                    <div class="form-group">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">      
                    <label>Name</label>
                    <div>     
                    <input type="text"class="form-control" name="RestaurantName" value={{$profile->restaurantname}}>
                    </div>      
                    </div>

                    <div class="form-group">
                    <label>Email</label>
                    <div>
                    <input type="text" name="email" class="form-control" value={{$profile->email}}>
                    </div>
                    </div>

                    <div class="form-group">
                    <label>Contact</label>
                    <div>
                    <input type="text" name="phone" class="form-control" value={{$profile->phone}}>
                    </div>
                    </div>

                    <div class="form-group">
                    <label>Address</label>
                    <div>
                    <input type="text" name="addressline1" class="form-control" value={{$profile->addressline1}}>
                    </div>
                    </div> 

                    <div class="form-group">
                    <label>Suburb</label>
                    <div>
                    <input type="text" name="suburbid" class="form-control" value={{$profile->suburbid}}>
                    </div>
                    </div>

                    <div class="form-group">
                    <label>Website</label>
                    <div>
                    <input type="text" name="websiteurl" class="form-control" value={{$profile->websiteurl}}>
                    </div>
                    </div>

                     <div class="form-group">
                        <div></div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>         

                      </div>
            </div>