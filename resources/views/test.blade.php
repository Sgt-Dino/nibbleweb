@include('layouts.top')


  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


<div class='input-group' >
{!! Form::text('fromDate', 2000/02/02, ['class'=>'form-control',"placeholder" => "2014-09-09 12:00:00", 'id' => 'calendar1']) !!}
</div>

<div class='input-group' >
{!! Form::text('fromDate', 2000/02/02, ['class'=>'form-control',"placeholder" => "2014-09-09 12:00:00", 'id' => 'calendar2']) !!}
</div>
<div class="container">

    <h1>Laravel Bootstrap Timepicker</h1>

    <div style="position: relative">

      <strong>Timepicker:</strong>

      <input class="timepicker form-control" type="text">

    </div>

</div>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script type="text/javascript">

$('.timepicker').datetimepicker({

    format: 'HH:mm:ss'

}); 

</script>  

<script>
     $(function() {
         $( "#calendar1" ).datepicker();
         $( "#calendar2" ).datepicker();
       });
     </script>

@include('layouts.bottomreport')