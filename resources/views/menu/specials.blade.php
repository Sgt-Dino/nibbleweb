@include('layouts.top')
<h1>Specials</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">Specials</div>
            <div class="panel-body">
                <div>
                {{ link_to_route('specials.create','Add new Special',null,['class'=>'btn btn-success']) }}
                </div><br>
                <table class="table table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-right">Price</th>
                                <th class="text-center" data-toggle="popover"  appendToBody="true" data-placement="top" title="Delete Special" data-content="A specific special item can be deleted. Click on the 'delete' button for the specific special item you want to delete.">Delete</th>
                            </tr>

                            @foreach($special as $spec)
                                <tr>
                                    <td>{{$spec->itemname}}</td>
                                    <td>{{$spec->description}}</td>
                                    <td align="right">R {{number_format($spec->cost,2)}}</td>
                            <td class="text-center">
                            @if(isset($spec)) 
                            <form method="post" action="{{ route('menu.Special.Remove', ['id' => $spec->specialid]) }}">
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
</div>
@include('layouts.bottom')