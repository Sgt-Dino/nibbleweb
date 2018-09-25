@include('layouts.top')
<h1>Add Food</h1>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
        
                <div class="panel panel-default">
                    <div class="panel-heading">Menu Food</div>

                    <div class="panel-body">

                        {!! Form::open(array('route'=>'food.store')) !!}
                            <div class="form-group">
                                {!! Form::label('itemname','Item Name') !!}
                                {!! Form::text('itemname',null,['required','class'=>'form-control','placeholder'=>'Add the item name here', 'maxlength'=>'30']) !!}
                            </div>

                             <div class="form-group">
                                {!! Form::label('itemdescription','Item Description') !!}
                                {!! Form::text('itemdescription',null,['required','class'=>'form-control','placeholder'=>'Describe the item here', 'maxlength'=>'100']) !!}
                            </div>                       

                            <div class="form-group">
                                            <label>Category</label>
                                            <select name="menucategoryid" class="form-control">
                                            @foreach($categories as $cat)
                                                <option name="menucategoryid" value={{$cat->menucategoryid}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>                             
                            </br>

                             <div class="form-group">
                                {!! Form::label('itemprice','Price') !!}
                                {!! Form::number('itemprice',null,['required','step=".01"','class'=>'form-control','placeholder'=>'Enter Price']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::button('Create',['type'=>'submit','class'=>'btn btn-primary']) !!}
                
                                <input class="btn btn-danger" type="button" value="Cancel" onclick="history.back()">
                            </div>                         
                        {!! Form::close() !!}
                    </div>
                </div>

                @if ( count( $errors ) > 0 )
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
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

@include('layouts.bottom')
