@extends('layouts.topbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Menu</th>
                                <th>Price</th>
                                <th class="text-center">Maintain</th>
                            </tr>

                            @foreach($foods as $food)
                                <tr>
                                    <td>{{$food->itemname}}</td>
                                    <td>{{$food->name}}</td>
                                    <td>{{$food->itemprice}}</td>
                                   {{-- <td>{{ link_to_route('food.show',$food->itemname,[$food->itemname]) }}</td> --}}
                                    <td align="right">
                                    {!! Form::open(array('route'=>['food.destroy',$food->itemname],'method'=>'DELETE')) !!}
                                            {{ link_to_route('food.edit','Edit',[$food->itemname],['class'=>'btn btn-primary']) }}
                                            |

                                            {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                                        {!! Form::close() !!}

                                        {{--<a href="#" class=" btn btn-sm btn-info" data-itemname={{"$value->itemname"}} data-name={{"$value->name"}} data-itemprice={{$value->itemprice}}">Edit</a>
                                        <button type="button" name='DeclineRequest' class="btn btn-sm btn-danger">Delete</button>--}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection