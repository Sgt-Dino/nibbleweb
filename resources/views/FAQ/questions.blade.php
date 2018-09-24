@include('layouts.top')
<h1>Frequently Asked Questions</h1>
<br>
    <!--questions-->
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4>Questions you may have</h4>
                            {{--<div class="form group">--}}
                                {{--<h4 class="text-right"><input type="text" id="search-input" class="'form-control" placeholder="Search..."></h4>--}}
                            {{--</div>--}}
                        </div>
                        <div class="panel-body">

                            <table class="table width=default table-striped">

                                <th  class="text-center">Question</th>
                                <th  class="text-center">Answer</th>

                                @foreach($question as $QandA)
                                    <tr>
                                        <td align="center">{{$QandA->question}}</td>
                                        <td align="center">{{$QandA->answer}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- questions-->

@include('layouts.bottom')
