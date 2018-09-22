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

{{ link_to_route('specials.create','Add new Special',null,['class'=>'btn btn-success']) }}

            </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.bottom')