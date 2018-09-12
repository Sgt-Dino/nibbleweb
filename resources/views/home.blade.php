@include('layouts.top')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}

                            <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Dashboard</div>

                                                <div class="panel-body">
                                                    Welcome to Nibble !
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="col-md-10">
                <h3>Bookings for Today</h3>
                </div>
                <div class="col">
                <h3><?php $todayDate = date("Y-m-d");echo $todayDate?></h3>
                </div>
                </div>

                <div class="panel-body">

                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>                       
                        <th class="text-center">Status</th>
                        <th class="text-center">Check-In</th>
                        <th class="text-center">Missed</th>
                    </tr>

                    @foreach($bookingTodayVar as $BookingsToday)
                    <tr>
                        <td class="text-left">{{$BookingsToday->time}}</td>
                        <td class="text-center">{{$BookingsToday->firstname}}</td>
                        <td class="text-center">{{$BookingsToday->phone}}</td>
                        <td class="text-center">{{$BookingsToday->numofguests}}</td>                    
                        <td class="text-center">{{$BookingsToday->status}}</td>
                        <td class="text-center">
                        @if(isset($BookingsToday)) 
                            <form method="post" action="{{ route('home.updateC', ['id' => $BookingsToday->bookingrequestid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="accepted" type="hidden" value="A">
                            <input name="status" type="hidden" value="C">
                            <button type ='submit' class="btn btn-sm btn-success">Check in</button>
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
                        <td class="text-center">
                        @if(isset($BookingsToday)) 
                            <form method="post" action="{{ route('home.updateM', ['id' => $BookingsToday->bookingrequestid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="accepted" type="hidden" value="A">
                            <input name="status" type="hidden" value="M">
                            <button type ='submit' class="btn btn-sm btn-danger">Missed</button>
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
                <div class="panel-heading">
                <h3>Canceled Bookings for Today</h3>
                </div>

                <div class="panel-body">

                    <table class="table table-hover table-striped">
                    <tr>
                        <th>Time</th>
                        <th>Guest Name</th>
                        <th>Phone</th>
                        <th>No of Guests</th>                       
                    </tr>
                    @if(isset($bookingsCanceled))
                    @foreach($bookingsCanceled as $BookingsC)
                    <tr>
                        <td>{{$BookingsC->time}}</td>
                        <td>{{$BookingsC->firstname}}</td>
                        <td>{{$BookingsC->phone}}</td>
                        <td>{{$BookingsC->numofguests}}</td>                    
                    </tr>
                    @endforeach
                    @endif
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.bottom')