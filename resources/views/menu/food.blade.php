@include('layouts.top')

<!--Popover-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Popover-->

<!-- menu -->
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>

                    <div class="panel-body">
                        <p>Select a category or add a dish to the menu</p>
                        </br>

                        <div class="col-md-10">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Category
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                @foreach($categories as $cat)
                                <li role="presentation"><a role="menuitem" tabindex="0" href="{{ route('menu.food.cat', ['id' => $cat->menucategoryid]) }}">{{$cat->name}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                        {{ link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}
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
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <!--Popover-->
                                <script>
                                    $(document).ready(function(){
                                        $('[data-toggle="popover"]').popover();
                                    });
                                </script>
                                <!--Popover-->

                                <th>Name</th>
                                <th>Menu</th>
                                <th>Price</th>

                                <!--Popover-->
                                <th class="text-center" data-toggle="popover" data-placement="right" title="Edit/Update Food" data-content="A specific food item can be edited or updated. Click on the 'edit' button for the specific food item you want to update.">Update</th>
                                <th class="text-center" data-toggle="popover" data-placement="left" title="Delete Food" data-content="A specific food item can be deleted. Click on the 'delete' button for the specific food item you want to delete.">Delete</th>
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
                                    <form action="{{ route('menu.food.destroy', ['id' => $food->menuitemid]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                                   
                                    <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Delete food">DELETE</button>
                                    </form>

                                    </td>
                                </tr>
                            @endforeach

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- food -->


@include('layouts.bottom')
