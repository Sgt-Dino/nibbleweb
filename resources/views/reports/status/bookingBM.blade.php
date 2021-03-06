@include('layouts.top')
<h1>Report By Date range</h1>
<br>
<!-- jQuery CDN -->
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">

<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- status report -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{ Session::get('message') }}
                        </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Status Report by Month</div>
                    <div class="panel-body">
                    {{--{!! Form::open(array('route'=>'reports.status.chart')) !!}--}}
<!-- Date Picker -->
                                <!-- <div class="form-group">
                                <label>Filter By</label>
                                <select name="filter" class="form-control">
                                <option selected name="filterRange" value="1">Day</option>
                                <option name="filterRange" value="2">Month</option>
                                </select>
                                </div> -->

                                <!-- <div class="form-group">
                                <label>Customer Status</label>
                                <select name="filter" class="form-control">
                                <option selected name="filterType" value="1">All</option>
                                <option name="filterType" value="2">Checked-In</option>
                                <option name="filterType" value="2">Missed</option>
                                <option name="filterType" value="2">Pending</option>
                                </select>
                                </div> -->

    <form method="get" action="{{'report'}}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <script type="text/javascript">
                    $(function() {
                        $( "#calendar1" ).datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true
                        });
                        $( "#calendar2" ).datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,
                        });
                        var startdate = $( "#calendar1" ).datepicker( "getDate" );
                        var enddate = $( "#calendar1" ).datepicker( "getDate" );
                    });
                </script>
<br>

                    <table>
                    <tr>
                    <col width="250">
                    <td>
                            <div class="form-group">
                            <label>Start Date:</label>
                            <div class='input-group'>
						  <div>
							<input required type="text" id="calendar1" name="calendar1" class="form-control" value="" placeholder="Start Date">
						  </div>
                          </div>
                          </div>

                    </td>
                    <td>
                    </td><td>

                          <div class="form-group">
                            <label>End Date:</label>
                            <div class='input-group'>
						  <div>
							<input required type="text" id="calendar2" name="calendar2" class="form-control" value="" placeholder="End Date">
						  </div>
                          </div>
                          </div>
                    </td>
                    </tr>
                    </table>

                          <button class="btn btn-primary" type="submit">Generate Report</button>
                </form>
                <br>
                <br>

<!-- Date Picker -->
<div>
@if($from == "")
<h4>Booking Requests</h4>
@else
<h4>Booking Requests from <?php echo date_format($from, 'Y-m-d') ?> to <?php echo date_format($to, 'Y-m-d') ?> </h4>
@endif
</div><br>
                        <table class="table table-hover table-striped">
                        
                            <th class="text-center">Status</th>
                            <th class="text-left">Date</th>
                            <th class="text-left">Time</th>
                            <th class="text-center">Amount of Guests</th>
                            <th class="text-center">Customer ID</th>

                            @foreach($statusBM as $statByMonth)
                                <tr>
                                    <td align="center">{{$statByMonth->status}}</td>
                                    <td align="left">{{$statByMonth->date}}</td>
                                    <td align="centre">{{$statByMonth->time}}</td>
                                    <td class="text-center">{{$statByMonth->numofguests}}</td>
                                    <td class="text-center">{{$statByMonth->customerid}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <a href="{{url('/statuschart')}}"></a><button class="btn btn-sm btn-primary">Chart</button>

                        {{--{{ link_to_route('/statusbymonth','chart',['class'=>'btn btn-success']) }}--}}

                        {{--{{TRYING this! link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}--}}

                        <a href="{{url('/pdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
@include('layouts.bottomreport')