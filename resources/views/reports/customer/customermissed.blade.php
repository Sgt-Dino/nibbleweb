@include('layouts.top')

<!-- customer report -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Report Missed</div>
                <div class="panel-body">

                    <table class="table table-hover table-striped">

                        <th class="text-center">Status</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Customer name</th>

                        @foreach($missed as $key=>$custmissed)
                            <tr>
                                @if($custmissed->status =='M')
                                    <td align="center">Missed</td>
                                @endif
                                {{--@if($customer->status =='P')--}}
                                {{--<td align="center">{{++$key}} &nbsp &nbsp &nbsp Pending</td>--}}
                                {{--@endif--}}
                                <td align="center">{{$custmissed->date}}</td>
                                <td class="text-center">{{$custmissed->firstname}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href={{url('customerreport')}}>Pending</a></li>
                            <li class="page-item"><a class="page-link" href={{url('customermissed')}}>Missed</a></li>
                            <li class="page-item"><a class="page-link" href={{url('customercheckedin')}}>Checked-in</a></li>
                        </ul>
                    </nav>
                    <table>
                        <th align="right">Amount missed: &nbsp {{$key + 1}}</th>
                    </table>
                    <hr>
                    {{--<a href="{{url('/customerpdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- customer report -->

@include('layouts.bottomreport')