@include('layouts.top')
<h1>Add Special</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{ Session::get('message') }}
                        </div>
                @endif
            <div class="panel panel-default">
                    <div class="panel-heading">Create Special</div>
                <div class="panel-body">
                <?php 
			        $restaurantadminid = Auth::id();				            
                ?> 
{!! Form::open(array('route'=>'specials.store')) !!}

                            <div class="form-group">
                                {!! Form::label('itemname','Special Name') !!}
                                {!! Form::text('itemname',null,['required','class'=>'form-control','placeholder'=>'Add the special name here','maxlength'=>'30']) !!}
                            </div>                    

                             <div class="form-group">
                                {!! Form::label('itemdescription','Special Description') !!}
                                {!! Form::text('description',null,['required','class'=>'form-control','placeholder'=>'Describe special here', 'maxlength'=>'100']) !!}
                            </div>                       

                             <div class="form-group">
                                {!! Form::label('itemprice','Price') !!}
                                {!! Form::number('cost',null,['required','step=".01"','class'=>'form-control']) !!}
                            </div>
                             
                            <br>
                             <div class="form-group">
                             {!! Form::hidden('active', 'Y') !!}
                             {!! Form::hidden('restaurantid', $restaurantadminid) !!}
                             {!! Form::hidden('specificday', 'S') !!}

                                {!! Form::label('days','On which days will the special run') !!}
                                <br>
                                <label class="checkbox-inline">{{ Form::checkbox('monday', '1') }}Mondays</label>
                                <label class="checkbox-inline">{{ Form::checkbox('tuesday', '1') }}Tuesdays</label>
                                <label class="checkbox-inline">{{ Form::checkbox('wednesday', '1') }}Wednesdays</label>   
                                <label class="checkbox-inline">{{ Form::checkbox('thursday', '1') }}Thursdays</label>
                                <label class="checkbox-inline">{{ Form::checkbox('friday', '1') }}Fridays</label>
                                <label class="checkbox-inline">{{ Form::checkbox('saterday', '1') }}Saterdays</label> 
                                <label class="checkbox-inline">{{ Form::checkbox('sunday', '1') }}Sundays</label>
                                <br>            
                            </div>        

                          


<br>
<table>
<tr>
<col width="300">
<td>
<div class="form-group">
    <div class='input-group'>
    <label>Start Date:</label>{!! Form::text('startdate', null, ['required','class'=>'form-control',"placeholder" => "Start Date", 'id' => 'calendar1']) !!}
    </div>
</div>

</td>
<td>
</td><td>

<div class="form-group">
    <div class='input-group'>
    <label>End Date:</label>{!! Form::text('enddate', null, ['required','class'=>'form-control',"placeholder" => "End Date", 'id' => 'calendar2']) !!}
    </div>
</div>
</td>
</tr>
</table>
<div class="form-group">
    {!! Form::button('Create',['type'=>'submit','class'=>'btn btn-primary']) !!}
    <input class="btn btn-danger" type="button" value="Cancel" onclick="history.back()">
</div>                         
{!! Form::close() !!}

    @if ( count( $errors ) > 0 )
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif 

                </div>
            </div>
        </div>
    </div>
</div>
    

@include('layouts.bottomspecial')