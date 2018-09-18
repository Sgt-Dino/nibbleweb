@include('layouts.top')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Update Category</h4></div>

                    <div class="panel-body">
                    {!! Form::open(array('action' => array('CategoryController@update', $cat->menucategoryid))) !!}
              
    <div class="form-group">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">      
      <label>Category Name</label>
      <div>     
      <input required type="text"class="form-control" name="name" value={{$cat->name}}>
      </div>      
    </div>

    <div class="form-group">
      <label>Description</label>
      <div>
      <textarea required name="description" class="form-control" cols="1" rows="1" >{{$cat->description}}</textarea>
      </div>
    </div>

    <div class="form-group">
        {!! Form::hidden('active',"Y",['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <div></div>
      <button type="submit" class="btn btn-primary">Update</button>
      <input class="btn btn-danger" type="button" value="Cancel" onclick="history.back()">
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

@include('layouts.bottom')