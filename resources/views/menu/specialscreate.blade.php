@include('layouts.top')

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

{!! Form::open(array('route'=>'specials.store')) !!}

<div class="form-group">
    <div class='input-group'>
    {!! Form::text('startdate', null, ['required','class'=>'form-control',"placeholder" => "Start Date", 'id' => 'calendar1']) !!}
    </div>
</div>
<br>
<br>
<br>

<div class="form-group">
    <div class='input-group'>
    {!! Form::text('enddate', null, ['required','class'=>'form-control',"placeholder" => "End Date", 'id' => 'calendar2']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::button('create',['type'=>'submit','class'=>'btn btn-primary']) !!}
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