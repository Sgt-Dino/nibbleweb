@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">

                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Menu</th>
                                <th>Price</th>
                                <th>Maintain</th>
                            </tr>

                            @foreach($foods as $key =>$value)
                                <tr>
                                    <td>{{$value->itemname}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->itemprice}}</td>
                                    <td>
                                        <a href="#" class=" btn btn-small btn-info" data-itemname={{"$value->itemname"}} data-name={{"$value->name"}} data-itemprice={{$value->itemprice}}">Edit</a>

                                    {{--<button type ='Button' class="btn btn-sm btn-success">Edit</button>--}}
                                </tr>
                            @endforeach
                        </table>
                        <button type ='Button' class="btn btn-sm btn-success">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    //   {{ link_to_route('food.create','Add new menuitem',null,['class'=>'btn btn-primary']) }}
@endsection