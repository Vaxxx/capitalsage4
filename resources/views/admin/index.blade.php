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
                                <td>
                                    {{$user->created_at}}
                                </td>
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
                        <tr><th>Measure</th><th>Target </th> <th>Comment</th><th>Date</th><th>Score</th></tr>

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
