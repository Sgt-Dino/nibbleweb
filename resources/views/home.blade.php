@extends('layouts.app')

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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookins for Today</div>

                <div class="panel-body">
                <table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Time</th> 
    <th>No of Guests</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>14:30</td> 
    <td>5</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>12:00</td> 
    <td>4</td>
  </tr>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection