@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    @include('includes.employee_header')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-map-marker red"></i><strong>Appraisals</strong></h2>

                    <div class="panel-actions">

                        {{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
                        {{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                    <table class="table table-bordered table-responsive">
                        <tr><th>Recipient</th><th>Date </th> <th>Deadline</th><th>Appraisal</th><th>Actions</th></tr>

                        @foreach($appraisals as $appraisal)
                            <tr>
                                <th>{{$appraisal->recipient}}</th>
                                <th>{{Carbon\Carbon::parse($appraisal->date_requested)->format('l jS \\of F Y')}}</th>
                                <th>{{Carbon\Carbon::parse($appraisal->deadline_date)->format('l jS \\of F Y')}}</th>
                                <th>{!!  $appraisal->subject!!}</th>
                                <th>
                                    <form action="{{route('appraisal.show', $appraisal->id)}}" method="get">
                                        <button type="submit" class="btn btn-xs btn-info">Reply</button>
                                    </form>
                                </th>
                                <th>
{{--                                    <form action="{{ route('appraisal.destroy',$user->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" onclick="return confirm('Are you sure you want to Delete the Appraisal?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  &nbsp;Delete</button>--}}
{{--                                    </form>--}}
                                </th>

                            </tr>

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-map-marker red"></i><strong>KPI</strong></h2>

                    <div class="panel-actions">

                        {{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
                        {{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                    <table class="table table-bordered table-responsive">
                        <tr><th>Target</th><th>Current Position</th><th>Manager's Comment</th><th>Date </th> <th>Score</th><th>Manager's Grade</th><th>Actions</th></tr>

                        @foreach($kpis as $kpi)
                            <tr>
                                <th>{{$kpi->target}}</th>
                                <th>{{$kpi->current}}</th>
                                <th>{{$kpi->comment}}</th>
                                <th>{{Carbon\Carbon::parse($kpi->start_date)->format('l jS \\of F Y')}}</th>
                                <th>
                                    <div class="progress bg-secondary">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="{{$kpi->score}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$kpi->score}}%">
                                            {{$kpi->score}}%
                                        </div>
                                    </div>
                                </th>
                                <th>{{$kpi->grade}}</th>
                                <th>
                                    <form action="{{route('kpi.show', $kpi->id)}}" method="get">
                                        <button type="submit" class="btn btn-xs btn-info">Update KPI</button>
                                    </form>
                                </th>


                            </tr>

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--------------------Goals Section-------------------------------->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-map-marker red"></i><strong>Goals</strong></h2>

                    <div class="panel-actions">

                        {{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
                        {{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                    <table class="table table-bordered table-responsive">
                        <tr><th>Description</th><th>Start Date </th> <th>End Date</th><th>Status</th><th>Percentage Completed</th><th>Actions</th></tr>

                        @foreach($goals as $goal)
                            <tr>
                                <th>{{$goal->description}}</th>
                                <th>{{Carbon\Carbon::parse($goal->start_date)->format('l jS \\of F Y')}}</th>
                                <th>{{Carbon\Carbon::parse($goal->end_date)->format('l jS \\of F Y')}}</th>
                                <th>{{$goal->status}}</th>
                                <th>
                                    <div class="progress bg-secondary">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="{{$goal->percentage_complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$goal->percentage_complete}}%">
                                            {{$goal->percentage_complete}}
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <form action="{{route('goal.show', $goal->id)}}" method="get">
                                        <button type="submit" class="btn btn-xs btn-info">Edit Goal</button>
                                    </form>
                                    <form action="{{ route('goal.destroy',$goal->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to Delete the goal?')" class="btn btn-danger text-white" title="Delete Goal"><i class="fa fa-trash"></i></button>
                                    </form>
                                </th>
                            </tr>

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>
@endsection
