@include('layouts.top')
<h1>Food</h1>
<br>
<!-- menu -->
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                    <div class="panel-body">
                        <p>Filter by category or add a dish to the menu</p>
                        </br>
                        <div class="col-md-10">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Category
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                @foreach($categories as $cat)
                                <li role="presentation"><a role="menuitem" tabindex="0" href="{{ route('menu.food.cat',['id' => Crypt::encrypt($cat->menucategoryid)]) }}">{{$cat->name}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div rel="tooltip" title="Add new food" class="col">
                        {{ link_to_route('food.create','Add new Food',null,['class'=>'btn btn-success']) }}
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- menu -->

    <!-- food -->            
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Food in Menu</div>

                    <div class="panel-body">
                    @if (!$foods->first()) 
                    <H3>No Food in menu or this category</h3>                      
                    @else
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <!--Popover-->
                                <th class="text-center" data-toggle="popover"  appendToBody="true" data-placement="top" title="Edit/Update Food" data-content="A specific food item can be edited or updated. Click on the 'edit' button for the specific food item you want to update.">Update</th>
                                <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Delete Food" data-content="A specific food item can be deleted. Click on the 'delete' button for the specific food item you want to delete."> Delete</th>
                                <!--Popover-->
                            </tr>
                            
                            @foreach($foods as $food)
                                <tr>
                                    <td>{{$food->itemname}}</td>
                                    @foreach($categories as $cat)
                                    @if($cat->menucategoryid==$food->menucategoryid)
                                    <td>{{$cat->name}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$food->itemprice}}</td>                                  
                                    <td align="center">
                                    <a href="{{ route('menu.food.edit',Crypt::encrypt($food->menuitemid)) }}"><button class="btn btn-sm btn-primary" rel="tooltip" title="Edit food">Edit</button></a>
                                    </td>

                                    <td align="center">

                                        @if(isset($food)) 
                                        <form method="post" action="{{ route('menu.food.Remove', ['id' => $food->menuitemid]) }}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="active" type="hidden" value="N">
                                        <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Delete item">DELETE</button>
                                        </form>
                                        @if ( count( $errors ) > 0 )
                                        <ul class="aler alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endif
                                    <!-- <form action="{{ route('menu.food.destroy', ['id' => $food->menuitemid]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                                   
                                    <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Delete food">DELETE</button>
                                    </form> -->
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- food -->


@include('layouts.bottom')
