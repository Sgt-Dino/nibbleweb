@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        
                <div class="panel panel-default">
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">

                        our form
                        {!! Form:open(array('route'=>'food.store')) !!}
                            <div class="form-group">
                                {!! Form::label('food','Add Food') !!}
                                {!! Form::text('food',null,['class'=>'form-control']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                errors
            </div>

        </div>
    </div>
@endsection