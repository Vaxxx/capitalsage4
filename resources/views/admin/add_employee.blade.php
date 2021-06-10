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
                        <h3>Add a New Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.store')}}" method="post" class="d-flex float-right">
                            @csrf
                            <input type="email" size="50" name="email" placeholder="Enter Employee's Email Address">
                            <button type="submit" class="btn btn-primary p-3" title="Add Employee">
                                <i class="fa fa-plus-circle">&nbsp;Add </i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')


@endsection
