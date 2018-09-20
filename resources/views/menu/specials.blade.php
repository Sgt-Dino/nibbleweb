@include('layouts.top')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">Create Special</div>
            <div class="panel-body">

{{ link_to_route('specials.create','Add new Special',null,['class'=>'btn btn-success']) }}

            </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.bottom')