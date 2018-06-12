@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Booking Requests</div>

                <div class="panel-body">

                    <table class="table table-hover table-striped">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Guest Name</th>
                        <th>Phone</th>
                        <th>No of Guests</th>                       
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach($bookingVar as $Bookings)
                    <tr>
                    <td>{{$Bookings->date}}</td>
                    <td>{{$Bookings->time}}</td>
                    <td>{{$Bookings->firstname}}</td>
                    <td>{{$Bookings->phone}}</td>
                    <td>{{$Bookings->numofguests}}</td>                    
                    <td>{{$Bookings->status}}</td>
                    <td>
                        <button type ='Button' class="btn btn-sm btn-success">Check in</button>
                    </tr>
                    @endforeach
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection