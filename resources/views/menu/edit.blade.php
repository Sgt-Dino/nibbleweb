@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Item</div>

                    <div class="panel-body">

                        {!! Form::model($foods,array('route'=>['food.update',$foods->id],'method'=>'PUT')) !!}
                        <div class="form-group">
                                {!! Form::label('itemname','Food Name') !!}
                                {!! Form::text('itemname',null,['class'=>'form-control']) !!}
                            </div>                    

                             <div class="form-group">
                                {!! Form::label('itemdescription','Item Description') !!}
                                {!! Form::text('itemdescription',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('menucategoryid','Menu Category ID') !!}
                                {!! Form::text('menucategoryid',null,['class'=>'form-control']) !!}
                            </div>

                             <div class="form-group">
                                {!! Form::label('itemprice','Cost') !!}
                                {!! Form::text('itemprice',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>

                @if($errors->has())
                    <ul class="aler alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endsection
