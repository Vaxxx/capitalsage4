@extends('layouts.member_template')
@section('sidebar')
    @include('includes.admin_sidebar')
@endsection
@section('content')

   @include('includes.admin_header')
    <!--/.row-->
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-map-marker red"></i><strong>Employees</strong></h2>
                    <form action="{{route('admin.store')}}" method="post" class="d-flex float-right">
                        @csrf
                        <input type="email" size="50" name="email" placeholder="Enter Employee's Email Address">
                        <button type="submit" class="btn btn-primary p-3" title="Add Employee">
                            <i class="fa fa-plus-circle">&nbsp;Add </i>
                        </button>
                    </form>
                    <div class="panel-actions">

{{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
{{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                    <table class="table table-bordered table-responsive">
                        <tr><th>Email Address</th><th>Date Added</th><th>Actions</th></tr>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>{{Carbon\Carbon::parse($user->start_date)->format('l jS \\of F Y')}}</td>
                                <td>
                                    <form action="{{ route('admin.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to Delete the Employee?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  &nbsp;Delete</button>
                                    </form>

                                </td>

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
                    <h2><i class="fa fa-map-marker red"></i><strong>Appraisals</strong></h2>

                    <div class="panel-actions">
                             <a href="{{route('admin.report')}}" class="btn btn-info btn-xs text-white">Generate Report for Appraisals</a>
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
                                <th>{{Carbon\Carbon::parse($appraisal->start_date)->format('l jS \\of F Y')}}</th>
                                <th>{{Carbon\Carbon::parse($appraisal->start_date)->format('l jS \\of F Y')}}</th>
                                <th>{!! $appraisal->subject!!}</th>
                                <th>
                                    <form action="{{ route('appraisal.destroy',$appraisal->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to Delete the Appraisal?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  &nbsp;Delete</button>
                                    </form>
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
                    <h2><i class="fa fa-map-marker red"></i><strong>Key Performance Indicator</strong></h2>

                    <div class="panel-actions">

{{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
{{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                    <table class="table table-bordered table-responsive">
                        <tr><th>Recipient</th><th>Objective</th><th>Target </th> <th>Comment</th><th>Current Status</th><th>Date</th><th>Score(in %)</th><th>Grade</th><th>Actions</th></tr>
                        @foreach($kpis as $kpi)
                            <tr>
                                <th>{{$kpi->recipient}}</th>
                                <th>{{$kpi->objective}}</th>
                                <th>{{$kpi->target}}</th>
                                <th>{{$kpi->comment}}</th>
                                <th>{{$kpi->current}}</th>
                                <th>{{Carbon\Carbon::parse($kpi->date)->format('l jS \\of F Y')}}</th>
                                <th>
                                    <div class="progress bg-secondary">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="{{$kpi->score}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$kpi->score}}%">
                                            {{$kpi->score}}%
                                        </div>
                                    </div>

                                     </th>
                                <th>{{$kpi->grade}}</th>
                                <th>
                                    <form action="{{ route('kpi.destroy',$kpi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to Delete the KPI?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  &nbsp;Delete</button>
                                    </form>
{{--                                    <a href="{{route('admin.grade', $kpi->id)}}" class="btn btn-info btn-xs">Add Grade</a>--}}
{{--                                    <form action="{{ route('kpi.update',$kpi->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i>  &nbsp;Add Grade</button>--}}
{{--                                    </form>--}}
                                </th>

                            </tr>

                        @endforeach
                          {{$kpis->links()}};
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- project team & activity start -->
@endsection
@section('scripts')
    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>
@endsection
