@include('layouts.top')
<h1>Bookings</h1>
<br>
<!-- Booking request -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">Your Pending Booking Requests</div>
                <div class="panel-body">
                @if (!$bookingVar->first()) 
                <h3 align="center">No Pending booking requests</h3>
                @else
                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>

                        <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Accept Booking Requests" data-content="When a customer makes a booking request, the request is sent to the restaurant. The restaurant now has the option to accept/ decline the request. If the request has been accepted, a notification will be sent to the customer. When the day comes of that specific booking request, the booking will appear on the home screen.">Accept</th>
                        <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Decline Booking Requests" data-content="When a customer makes a booking request, the request is sent to the restaurant. The restaurant now has the option to accept/ decline the request. If the request has been declined, a notification will be sent to the customer. Declined requests are displayed below.">Decline</th>
                    </tr>
                    <?php $count = 0; ?>
                    @foreach($bookingVar as $Bookings) 
                    <?php $count = $count+1; ?>                  
                    <tr>
                        <td align="left">{{$Bookings->date}}</td>
                        <td align="centre">{{$Bookings->time}}</td>
                        <td class="text-center">{{$Bookings->firstname}}</td>
                        <td class="text-center">{{$Bookings->phone}}</td>
                        <td class="text-center">{{$Bookings->numofguests}}</td>
                        <td align="center">
                            @if(isset($Bookings)) 
                            <form method="post" action="{{ route('bookings.index.updateA', ['id' => $Bookings->bookingrequestid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="accepted" type="hidden" value="Y">
                            <input name="status" type="hidden" value="Y">
                            <button type ='submit' name='AcceptRequest' class="btn btn-sm btn-success" rel="tooltip" title="Accept booking request">Accept</button>
                            </form>
                            @if ( count( $errors ) > 0 )
                            <ul class="aler alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            @endif
                        </td>
                        <td align="center">  
                            @if(isset($Bookings)) 
                            <form method="post" action="{{ route('bookings.index.updateD', ['id' => $Bookings->bookingrequestid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="accepted" type="hidden" value="D">
                            <input name="status" type="hidden" value="A">
                            <button type="submit" name='DeclineRequest' class="btn btn-sm btn-danger" rel="tooltip" title="Decline booking request">Decline</button>
                            </form>
                            @if ( count( $errors ) > 0 )
                            <ul class="aler alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            @endif                         
                        </td>
                    </tr>
                    @endforeach
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
</br>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Declined Booking Requests for this week</div>
                <div class="panel-body">
                @if (!$bookingD->first()) 
                <h3 align="center">No Declined Booking Requests for this week</h3>
                @else
                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>
                        <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Accept Declined Booking Requests" data-content="When a customer makes a booking request and the request is declined, the declined request will be displayed here. If, for any reason, your restaurant is now able to accommodate this request- the restaurant has the option to accept the request. A notification will be sent to the customer. ">Accept</th>
                    </tr>                   
                    @foreach($bookingD as $Bookings)                   
                    <tr>
                        <td align="left">{{$Bookings->date}}</td>
                        <td align="centre">{{$Bookings->time}}</td>
                        <td class="text-center">{{$Bookings->firstname}}</td>
                        <td class="text-center">{{$Bookings->phone}}</td>
                        <td class="text-center">{{$Bookings->numofguests}}</td>
                        <td align="center">
                            @if(isset($Bookings)) 
                            {!! Form::open(array('action' => array('bookingsController@updateA', $Bookings->bookingrequestid))) !!}
                            <form method="post" action="{{ route('bookings.index.updateA', ['id' => $Bookings->bookingrequestid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="accepted" type="hidden" value="N">
                            <input name="status" type="hidden" value="N">
                            <button type ='submit' name='AcceptRequest' class="btn btn-sm btn-success">Accept</button>
                            </form>
                            {!! Form::close() !!}
                            @if ( count( $errors ) > 0 )
                            <ul class="aler alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            @endif
                        </td>
                    </tr>                                       
                    @endforeach
                    </table>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
</br>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Accepted Booking Requests for this week</div>
                <div class="panel-body">
                @if (!$bookingA->first()) 
                <h3 align="center">No Accepted Booking Requests for this week</h3>
                @else
                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>
                    </tr>                   
                    @foreach($bookingA as $Bookings)                   
                    <tr>
                        <td align="left">{{$Bookings->date}}</td>
                        <td align="centre">{{$Bookings->time}}</td>
                        <td class="text-center">{{$Bookings->firstname}}</td>
                        <td class="text-center">{{$Bookings->phone}}</td>
                        <td class="text-center">{{$Bookings->numofguests}}</td>                                              
                    </tr>                                       
                    @endforeach
                    </table>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.bottom')