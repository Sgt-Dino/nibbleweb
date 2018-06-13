@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        
                <div class="panel panel-default">
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">

                        {!! Form::open(array('route'=>'food.store')) !!}
                            <div class="form-group">
                                {!! Form::label('food','Add Food Name') !!}
                                {!! Form::text('food',null,['class'=>'form-control']) !!}
                            </div>                    

                             <div class="form-group">
                                {!! Form::label('Price','Add Item Description') !!}
                                {!! Form::text('Price',null,['class'=>'form-control']) !!}
                            </div>

                               <div class="form-group">
                                {!! Form::label('Price','Add Menu Category ID') !!}
                                {!! Form::text('Price',null,['class'=>'form-control']) !!}
                            </div>

                             <div class="form-group">
                                {!! Form::label('Price','Add Cost') !!}
                                {!! Form::text('Price',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::button('create',['type'=>'submit','class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

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
@endsection