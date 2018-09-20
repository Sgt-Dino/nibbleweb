@include('layouts.top')
<h1>Category</h1>
<br>
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
                                    <a href="{{ route('menu.category.edit',Crypt::encrypt($cat->menucategoryid)) }}"><button class="btn btn-sm btn-primary" rel="tooltip" title="Edit category">Edit</button></a>
                                    </td>
                                    <td align="center">

                            @if(isset($cat)) 
                            <form method="post" action="{{ route('menu.Category.Remove', ['id' => $cat->menucategoryid]) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <input name="active" type="hidden" value="N">
                            <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Delete category">DELETE</button>
                            </form>
                            @if ( count( $errors ) > 0 )
                            <ul class="aler alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            @endif

                                   
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ link_to_route('category.create','Add new Category',null,['class'=>'btn btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- food -->

    @include('layouts.bottom')