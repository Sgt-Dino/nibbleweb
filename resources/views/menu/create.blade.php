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
                                {!! Form::label('itemname','Add Food Name') !!}
                                {!! Form::text('itemname',null,['class'=>'form-control']) !!}
                            </div>                    

                             <div class="form-group">
                                {!! Form::label('itemdescription','Add Item Description') !!}
                                {!! Form::text('itemdescription',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('menucategoryid','Add Menu Category ID') !!}
                                {!! Form::text('menucategoryid',null,['class'=>'form-control']) !!}
                            </div>

                             <div class="form-group">
                                {!! Form::label('itemprice','Add Cost') !!}
                                {!! Form::text('itemprice',null,['class'=>'form-control']) !!}
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