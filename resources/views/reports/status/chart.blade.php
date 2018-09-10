<html>
  <head>

<div class="panel-body">
{{--{!! Form::open(array('route'=>'food.store')) !!}--}}
{!! Form::open(array('action'=>'ReportController@show')) !!}
    <form method="post" action="{{route('reports.status.chart')}}">

<!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">


        // Load the Visualization API and the corechart package.
        //use upcoming to test the charts Google is about to release
            google.charts.load('current', {'packages':['corechart']});

        // If you want a different or additional chart type, substitute
        // or add the appropriate package name for corechart above
        // (e.g., {packages: ['corechart', 'table', 'sankey']}.
        // You can find the package name in the 'Loading' section of the
        // documentation page for each chart.

          // Set a callback to run when the Google Visualization API is loaded.

            //google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {




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
              var options = {'title':'How Much Pizza I Ate Last Night',
                           'width':400,
                           'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>

    </form>

    {!! Form::close() !!}
</div>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
