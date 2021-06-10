@extends('layouts.member_template')
@section('sidebar')
    @include('includes.admin_sidebar')
@endsection
@section('content')
    @include('includes.admin_header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3>Update Grade</h3>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.gradeStore') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <label class="col-form-label" for="inputGroupSelect01">Grade</label>
                        </div>
                        <div class="card-body">
                            <div class="form-group">

                                <div class="form-control">
                                    <select class="custom-select" id="inputGroupSelect01" name="grade" required>
                                        <option selected>Choose Grade...</option>
                                        <option value="n/a">Not Available</option>
                                        <option value="unsatisfactory">Unsatisfactory</option>
                                        <option value="needs_improvement">Needs Improvement</option>
                                        <option value="proficient">Proficient</option>
                                        <option value="commendable">Commendable</option>
                                        <option value="excellent">Excellent</option>
                                    </select>

                                    @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Add Grade') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$kpi->id}}" name="id">
                    <input type="hidden" value="{{$kpi->recipient}}" name="recipient">

                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')


@endsection
