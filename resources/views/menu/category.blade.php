@include('layouts.top')

<!-- category -->            
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Menu Categories</div>

                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            
                            @foreach($category as $cat)
                                <tr>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->description}}</td>
                                  
                                    <td align="center">
                                    <a href=#><button class="btn btn-sm btn-primary">Edit</button></a>
                                    </td>
                                    <td align="center">
                                    <form action=# method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                                   
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>                                   
                                    </form>
                                            
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ link_to_route('food.create','Add new item',null,['class'=>'btn btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- food -->  
                
    @include('layouts.bottom')