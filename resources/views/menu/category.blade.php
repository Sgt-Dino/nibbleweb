@include('layouts.top')
<h1>Category</h1>
<br>
<!-- category -->
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Menu Categories</div>

                    <div class="panel-body">
                    <div>
                    {{ link_to_route('category.create','Add new Category',null,['class'=>'btn btn-success']) }}
                    </div><br>
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Edit/Update Category" data-content="A specific category item can be edited or updated. Click on the 'edit' button for the specific category item you want to update.">Update</th>
                                <th class="text-center" data-toggle="popover"  appendToBody="true" data-placement="top" title="Delete Category" data-content="A specific category item can be deleted. Click on the 'delete' button for the specific category item you want to delete.">Delete</th>
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
                            <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Delete category">Delete</button>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- category -->

<br>
<br>
    <!-- deleted -->
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Deleted Categories</div>

                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center" data-toggle="popover" appendToBody="true" data-placement="top" title="Retrieve Category" data-content="If you want to reinstate a category that was previously deleted, choose the option to 'retrieve' the category.">Retrieve</th>
                            </tr>

                            @foreach($deleted as $del)
                                <tr>
                                    <td>{{$del->name}}</td>
                                    <td>{{$del->description}}</td>
                                    <td class="text-center">
                                        @if(isset($del)) 
                                        <form method="post" action="{{ route('menu.Category.Retrieve', ['id' => $del->menucategoryid]) }}">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <input name="active" type="hidden" value="Y">
                                        <button type="submit" class="btn btn-sm btn-danger" rel="tooltip" title="Retrieve category">Retrieve</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div><!-- category -->

    @include('layouts.bottom')