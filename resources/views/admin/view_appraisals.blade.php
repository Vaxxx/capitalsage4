@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Appraisals</h2>
                    </div>
                    <div class="card-body text-center">
                        <table border="1" class="table table-responsive table-bordered text-center">
                            <tr>
                                <th> Recipient</th>
                                <th> Subject</th>
                                <th>Response </th>
                                <th>Date Requested </th>
                                <th>Deadline Date </th>
                                <th>Response Time </th>
                            </tr>
                            @foreach($appraisals as $appraisal)
                                <tr>

                                    <td>{{ $appraisal->recipient}}</td>
                                    <td> {!!  $appraisal->subject!!}</td>
                                    <td>{{$appraisal->reply }}</td>
                                    <td>{{Carbon\Carbon::parse($appraisal->date_requested)->format('l jS \\of F Y')}}</td>
                                    <td>{{Carbon\Carbon::parse($appraisal->deadline_date)->format('l jS \\of F Y')}}</td>
                                    <td>{{Carbon\Carbon::parse($appraisal->response_time)->format('l jS \\of F Y')}}</td>

                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
