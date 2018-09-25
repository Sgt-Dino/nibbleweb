@include('layouts.top')

<!-- customer report -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Report by customer status</div>
                <div class="panel-body">
                @if($status == "All")
                <h4>Status: All status</h4>
                @elseif($status == "P")
                <h4>Status: Pending</h4>
                @elseif($status == "M")
                <h4>Status: Missed</h4>
                @elseif($status == "C")
                <h4>Status: Checked-In</h4>
                @endif
                <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ route('reports.statuschange',['id' => 'P']) }}">Pending</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.statuschange',['id' => 'M']) }}">Missed</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.statuschange',['id' => 'C']) }}">Checked-in</a></li>
                        </ul>
                </nav>
                    @if(!$cust->first())
                        <h3 align="center">No status available</h3>
                    @else
                        <table class="table table-hover table-striped">
                            <th class="text-center">Date</th>
                            <th class="text-center">Total guests</th>
                            <th class="text-center">Customer name</th>
                            @foreach($cust as $key=>$customer)
                                <tr>
                                    <td align="center">{{$customer->date}}</td>
                                    <td align="center">{{$customer->numofguests}}</td>
                                    <td class="text-center">{{$customer->firstname}}</td>
                                </tr>
                            @endforeach
                        </table>
                            <table>
                                <th align="right">Amount pending: &nbsp {{$key + 1}}</th>
                            </table>
                    @endif
                    <hr>
                    <a href="{{url('/customerpdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- customer report -->

@include('layouts.bottomreport')