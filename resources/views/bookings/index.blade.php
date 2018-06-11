@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings Today</div>

                <div class="panel-body">
                    List of bookings for today. Check customer in.

                    <table class="table">
                    <tr>
                        <th>Guest Name</th>
                        <th>No of Guests</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Check-In</th>
                    </tr>
                   @foreach($bookingVar as $Bookings)
                    <tr>
                        <td>{{$Bookings->customerid}}</td>
                        <td>{{$Bookings->numofguests}}</td>
                        <td>{{$Bookings->time}}</td>
                        <td>{{$Bookings->status}}</td>
                        <td>
                        <button type ='Submit'>Check in</button>
                       
                        </td>
                    </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection