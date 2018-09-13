@include('layouts.top')

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
                <div class="panel-heading"><h4>Your Pending Booking Requests</h4></div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>
                        <th class="text-center">Accept</th>
                        <th class="text-center">Decline</th>
                    </tr>                   
                    @foreach($bookingVar as $Bookings)                   
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
                            <input name="accepted" type="hidden" value="A">
                            <input name="status" type="hidden" value="A">
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
                <div class="panel-heading"><h4>Declined Booking Requests for this week</h4></div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>
                        <th class="text-center">Accept</th>
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
                            <input name="accepted" type="hidden" value="A">
                            <input name="status" type="hidden" value="A">
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
                <div class="panel-heading"><h4>Accepted Booking Requests for this week</h4></div>
                <div class="panel-body">
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
                    </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.bottom')