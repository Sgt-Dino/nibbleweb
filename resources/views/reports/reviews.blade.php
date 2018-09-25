@include('layouts.top')

<!-- reviews report -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Review Report</div>
                <div class="panel-body">

                    <div class="col-md-8">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Review Ratings</label></td>
                                    <td>&nbsp &nbsp &nbsp</td>
                                    <td><select name="filter" class="form-control">
                                            <option selected name="filterRating" value="1">5 star</option>
                                            <option name="filterType" value="2">4 star</option>
                                            <option name="filterType" value="3">3 star</option>
                                            <option name="filterType" value="4">2 star</option>
                                            <option name="filterType" value="5">1 star</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">

                        <th class="text-center">Rating</th>
                        <th class="text-center">Date</th>
                        <th class="text-left">Comment</th>
                        @foreach($reviews as $review)
                            <tr>
                                <td align="center">{{$review->rating}}</td>
                                <td align="center">{{$review->date}}</td>
                                <td align="left">{{$review->comment}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{url('/reviewpdf/{$reviews}')}}"><button class="btn btn-sm btn-primary">PDF</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- reviews report -->

@include('layouts.bottomreport')