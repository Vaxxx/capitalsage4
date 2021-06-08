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
                                <th>{{$appraisal->date_requested}}</th>
                                <th>{{$appraisal->deadline_date}}</th>
                                <th>{{$appraisal->subject}}</th>
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
@endsection
