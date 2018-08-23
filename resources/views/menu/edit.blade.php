@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Item</div>

                    <div class="panel-body">
                    {!! Form::open(array('action' => array('FoodController@update', $food->menuitemid))) !!}
                                                               
  <form method="post" action="{{ route('menu.food.update', ['id' => $food->menuitemid]) }}">

    <div class="form-group">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">      
      <label>Food Name</label>
      <div>     
      <input type="text"class="form-control" name="itemname" value={{$food->itemname}}>
      </div>      
    </div>

    <div class="form-group">
      <label>Menu Category ID</label>
      <div>
      <input type="text" name="menucategoryid" class="form-control" value={{$food->menucategoryid}}>
      </div>
    </div>

<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
    </ul>
  </div>

<div class="form-group">
      <label>Item Description</label>
      <div>
      <input type="text" name="itemdescription" class="form-control" value={{$food->itemdescription}}>
      </div>
    </div>

    <div class="form-group">
      <label>Cost</label>
      <div>
      <input type="text" name="itemprice" class="form-control" value={{$food->itemprice}}>
      </div>
    </div>

    <div class="form-group">
      <div></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>


                            
                        {!! Form::close() !!}

                    </div>
                </div>

                @if ( count( $errors ) > 0 )
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
