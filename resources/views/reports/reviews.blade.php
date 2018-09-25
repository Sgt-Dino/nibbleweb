@include('layouts.top')
<h1>Reviews</h1>
<br>
<!-- reviews report -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Review Report</div>
                <div class="panel-body">
                    @if($rating == "All")
                        <h4>Rating: All ratings</h4>
                    @elseif($rating == "5")
                        <h4>Rating: 5 stars</h4>
                    @elseif($rating == "4")
                        <h4>Rating: 4 stars</h4>
                    @elseif($rating == "3")
                        <h4>Rating: 3 stars</h4>
                    @elseif($rating == "2")
                        <h4>Rating: 2 stars</h4>
                    @elseif($rating == "1")
                        <h4>Rating: 1 star</h4>
                    @endif
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ route('reports.ratingchange',['id' => '5']) }}">5 star</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.ratingchange',['id' => '4']) }}">4 star</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.ratingchange',['id' => '3']) }}">3 star</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.ratingchange',['id' => '2']) }}">2 star</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('reports.ratingchange',['id' => '1']) }}">1 star</a></li>
                        </ul>
                    </nav>

                    @if(!$reviews->first())
                        <h3 align="center">No ratings available</h3>
                    @else
                        <table class="table table-hover table-striped">
                            <th class="text-center">Rating</th>
                            <th class="text-center">Date</th>
                            <th class="text-left">Comment</th>

                            @foreach($reviews as $key => $review)
                                <tr>
                                    <td align="center">{{$review->rating}}</td>
                                    <td align="center">{{$review->date}}</td>
                                    <td align="left">{{$review->comment}}</td>
                                </tr>
                            @endforeach
                        </table>
                            <table>
                                <th align="right">Amount of ratings: &nbsp {{$key + 1}}</th>
                            </table>
                    @endif
                        <hr>
                    <a href="{{url('/reviewpdf')}}"><button class="btn btn-sm btn-primary">PDF</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- reviews report -->

@include('layouts.bottomreport')