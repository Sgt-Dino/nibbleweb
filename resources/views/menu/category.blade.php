@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category Items</div>
                    <div class="panel-body">

                    //table of categories for food
                    </div>
            </div>
        </div>
    </div>
</div>

{!! Form::open() !!}
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, array('class' => 'form-control')) !!}
{!! Form::close() !!}
@endsection


