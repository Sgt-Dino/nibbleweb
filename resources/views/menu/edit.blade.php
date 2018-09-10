@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Update Item</h4></div>

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

@foreach($categories as $cat)
@if( $food->menucategoryid == $cat->menucategoryid )
<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">{{$cat->name}}
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
	@foreach($categories as $cat)
      <li role="presentation"><a role="menuitem" tabindex="0" href="#">{{$cat->name}}</a></li>
	@endforeach
    </ul>
</div>

  @endif
  @endforeach
</br>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
$(".dropdown-menu li a").click(function(){ 
  $(".btn:first-child").html($(this).text()+' <span class="caret"></span>');
});
});
</script>

@endsection
