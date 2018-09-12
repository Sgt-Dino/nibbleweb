@include('layouts.top')

    <!--questions-->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">


                        <div class="panel-heading">Questions you may have
                            <div class="form group">
                                <input type="text" align="right" id="search-input" class="'form-control" placeholder="Search...">
                            </div>
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
