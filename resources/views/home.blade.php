@extends('layouts.topbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nibble</div>

                <div class="panel-body">
                    Welcome to Nibble !
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings Today</div>

                <div class="panel-body">

                    <table class="table table-hover table-striped">
                    <tr>
                        <th>Time</th>
                        <th>Guest Name</th>
                        <th>Phone</th>
                        <th>No of Guests</th>                       
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach($bookingTodayVar as $Bookings)
                    <tr>
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
</div>--}}
@endsection