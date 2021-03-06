@include('layouts.top')
<h1>Category Create</h1>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
        
                <div class="panel panel-default">
                    <div class="panel-heading">Menu Category</div>

                    <div class="panel-body">

                        {!! Form::open(array('route'=>'category.store')) !!}
                            <div class="form-group">
                                {!! Form::label('name','Category Name') !!}
                                {!! Form::text('name',null,['required','class'=>'form-control','placeholder'=>'Add category name here', 'maxlength'=>'30']) !!}
                            </div>                    

                             <div class="form-group">
                                {!! Form::label('description','Category Description') !!}
                                {!! Form::text('description',null,['required','class'=>'form-control','placeholder'=>'Describe the category here', 'maxlength'=>'100']) !!}
                            </div>

                                <?php
                                $userId = Auth::id();
                                ?>

                             <div class="form-group">
                                {!! Form::hidden('restaurantid',$userId,['class'=>'form-control']) !!}
                                {!! Form::hidden('active',"Y",['class'=>'form-control']) !!}
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

@include('layouts.bottom')
