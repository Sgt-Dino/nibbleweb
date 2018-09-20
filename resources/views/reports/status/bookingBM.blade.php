@include('layouts.top')

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
                <div class="panel panel-default">
                    <div class="panel-heading">Status Report by Month</div>

                    <div class="panel-body">

                    {{--{!! Form::open(array('route'=>'reports.status.chart')) !!}--}}

<!-- Date Picker -->

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
                    });
                </script>

                        <div class="form-group">
                            <div class='input-group'>
                                {!! Form::text('startdate', null, ['required','class'=>'form-control',"placeholder" => "Start Date", 'id' => 'calendar1']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class='input-group'>
                                {!! Form::text('enddate', null, ['required','class'=>'form-control',"placeholder" => "End Date", 'id' => 'calendar2']) !!}
                            </div>
                        </div>
<?php
$startdate ='2018/04/02';
$enddate ='2018/05/03';
?>

<button class="btn btn-default" type="button"><a href="{{ route('reports.status.report', ['startdate' => $startdate , 'enddate' => $enddate]) }}">Button</a></button>

<form method="post" action="{{ route('reports.status.report',['startdate' => $startdate, 'enddate' => $enddate]) }}">
{{csrf_field()}}
<input name="_method" type="hidden" value="PATCH">
 <input name="sartdate" type="hidden" value='2018'>
 <input name="enddate" type="hidden" value='2018'>
 <button type ='submit' class="btn btn-sm btn-danger">Report This</button>
</form>

                        <div class="form-group">
                        {!! link_to_route('reports.status.report','Generate Report',['startdate' => Crypt::encrypt($startdate) , 'enddate' => Crypt::encrypt($enddate)]) !!}
                            {!! Form::button('create',['type'=>'submit','class'=>'btn btn-primary']) !!}
                        </div>

<!-- Date Picker -->

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
                        <a href="{{route('reports.status.chart')}}"></a><button class="btn btn-sm btn-primary">Chart</button>

                        {{--{{ link_to_route('/statusbymonth','chart',['class'=>'btn btn-success']) }}--}}

                        {{--{{TRYING this! link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}--}}

                        <a href="{{url('/statusbymonth/pdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
@include('layouts.bottomreport')