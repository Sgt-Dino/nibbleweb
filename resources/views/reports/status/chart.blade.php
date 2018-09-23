<html>
  <head>

<div class="panel-body">
{{--{!! Form::open(array('route'=>'food.store')) !!}--}}
{{--{!! Form::open(array('action'=>'ReportController@create')) !!}--}}
    {{--<form method="post" action="{{url('/reportbymonth/statuschartt')}}">--}}

<!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

        var analytics = <?php echo $status; ?>

        // Load the Visualization API and the corechart package.
        //use upcoming to test the charts Google is about to release
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);



          // Set a callback to run when the Google Visualization API is loaded.

            //google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

              var data = new google.visualization.araayToDataTable(analytics);
              var options= {
                  title: 'Percentage of Checked-in and Missed Booking Requests'
              };
              var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
              chart.draw(data,options);



              // Create the data table.

              // var data = new google.visualization.DataTable();
              // data.addColumn('string', 'Topping');
              // data.addColumn('number', 'Slices');
              // data.addRows([
              //     ['Mushrooms', 3],
              //     ['Onions', 1],
              //     ['Olives', 1],
              //     ['Zucchini', 1],
              //     ['Pepperoni', 2]
              // ]);

              // Set chart options
            //   var options = {'title':'How Much Pizza I Ate Last Night',
            //                'width':400,
            //                'height':300};

          }
        </script>


    {{--{!! Form::close() !!}--}}
</div>
  </head>
          <div class="container">
              <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                      <div class="panel panel-default">
                          <div class="panel-heading">Status Report by Month</div>

                          <div class="panel-body">
                              <div id="pie_chart" style="width:750px; height:450px;">

                              </div>



                          </div>
                      </div>
                  </div>
              </div>
          </div>



  <!--Div that will hold the pie chart-->
    {{--<div id="chart_div"></div>--}}

</html>
