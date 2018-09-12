<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Nibble</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style4.css">

        <!-- Date Picker -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->

    </head>

    <body>
<!-- status report -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Status Report by Month</div>
                    {{--{!! Form::open(array('route'=>'reports.status.chart')) !!}--}}

                    {{--{!! Form::open(array('route'=>'food.store')) !!}--}}

                    <!-- Date Picker -->
                    <table class="table">
                        </br>
                        <th class="text-left">Start Date: <input id="startDate" width="276" /></th>
                        <th class="text-left">End Date: <input id="endDate" width="276" /></th>
                    </table>
                        <script>
                            //var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                            $('#startDate').datepicker({
                                uiLibrary: 'bootstrap4',
                                iconsLibrary: 'fontawesome',
                                minDate: new Date(2016, 0, 1),
                                onSelect: function(dateText){
                                // maxDate: function () {
                                    return $('#endDate').val();
                                    // var startDate =$('#startDate').val();
                                    // var endDate =$('#endDate').val();
                                    // var status =$('#status').val();
                                    // chart(startDate, endDate, status);
                                }
                            });
                            $('#endDate').datepicker({
                                uiLibrary: 'bootstrap4',
                                iconsLibrary: 'fontawesome',
                                onSelect: function(dateText){
                                // minDate: function () {
                                    return $('#startDate').val();
                                    // var startDate =$('#startDate').val();
                                    // var endDate =$('#endDate').val();
                                    // var status =$('#status').val();
                                    // chart(startDate, endDate, status);
                                }
                            });
//---------------------------------------------------------------------
                            {{--function chart(criteria1, criteria2, criteria3)--}}
                            {{--{--}}
                                {{--$.ajax({--}}
                                    {{--type:   'get',--}}
                                    {{--url:    "{!!url('status-by-month')  !!}",--}}
                                    {{--data: {startDate:criteria1, endDate:criteria2, status:criteria3},--}}
                                    {{--success:function(data)--}}
                                    {{--{--}}
                                        {{--$('.status-by-month').empty().html(data);--}}
                                    {{--}--}}

                                {{--})--}}
                            {{--}--}}

                        </script>
                    <!-- Date Picker -->

                    <div class="panel-body">

                        <table class="table table-striped">

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
<!-- status report -->
    </body>
</html>