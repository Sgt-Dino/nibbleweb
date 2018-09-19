@include('layouts.top')

     
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        
        
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        

 

   
        
<!-- status report -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Status Report by Month</div>

                    <div class="panel-body">

                    {{--{!! Form::open(array('route'=>'reports.status.chart')) !!}--}}

<!-- Date Picker -->
                     <div class="container">
                     <form method="post" action="{{ route('reportbymonth.datechange', ['startDate','endDate']) }}">
                     {{csrf_field()}}
                        <div class='col-md-4'>
                            <div class="form-group">
                                <div class='input-group date' id='startDate'>
                                    <input name="startDate" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <div class='input-group date' id='endDate'>
                                    <input name="endDate" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type ='submit' name='Date' class="btn btn-sm btn-success">Date</button>                      
                        </form>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                            $('#startDate').datetimepicker();
                            $('#endDate').datetimepicker({
                                useCurrent: false //Important! See issue #1075
                            });
                            $("#startDate").on("dp.change", function (e) {
                                $('#endDate').data("DateTimePicker").minDate(e.date);
                            });
                            $("#endDate").on("dp.change", function (e) {
                                $('#startDate').data("DateTimePicker").maxDate(e.date);
                            });
                            $('#startDate').data('DateTimePicker').date();
                            $('#endDate').data('DateTimePicker').date();                           
                        });
                    </script>
                    
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

                        <a href="{{url('/report/pdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
@include('layouts.bottomreport')