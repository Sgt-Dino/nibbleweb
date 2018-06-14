@extends('layouts.topbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Booking Requests</div>

                <div class="panel-body">

                    <table class="table table-hover table-striped">
                    <tr>
                        <th class="text-left">Date</th>
                        <th class="text-centre">Time</th>
                        <th class="text-center">Guest Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">No of Guests</th>
                        <th class="text-center">Action</th>
                    </tr>

                    @foreach($bookingVar as $Bookings)
                    <tr>
                    <td align="left">{{$Bookings->date}}</td>
                    <td align="centre">{{$Bookings->time}}</td>
                    <td class="text-center">{{$Bookings->firstname}}</td>
                    <td class="text-center">{{$Bookings->phone}}</td>
                    <td class="text-center">{{$Bookings->numofguests}}</td>
                    <td align="right" style="padding-right: 20px">
                        <button type ='button' name='AcceptRequest' class="btn btn-sm btn-success">Accept</button>
                        <button type="button" name='DeclineRequest' class="btn btn-sm btn-danger">Decline</button>
                    </tr>
                    @endforeach
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>

{{--{!! Form::model($yourInstance,['route'=>['bookingsController.update','id'=>$yourInstance->id],'method'=>'PATCH',]) !!}--}}{{--

{!!Form::model($Booking,['url'=> ['booking',$Booking->id],'method'=>'PUT'])!!}

.... your form

{!!Form::close()!!}--}}

{{--{!! Form::open() !!}
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, array('class' => 'form-control')) !!}
{!! Form::close() !!}--}}

@endsection