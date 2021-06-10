@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    @include('includes.employee_header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3>Update KPI Status</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('kpi.update', $kpi->id)}}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" value="{{$kpi->id}}" name="id">
                    <input type="hidden" value="{{$kpi->objective}}" name="objective">
                    <input type="hidden" value="{{$kpi->grade}}" name="grade">
                    <div class="form-group">
                        <label for="description"><p>Target</p></label>
                        <!--                        <div v-if="editCategoryData.image.name">-->
                        <div class="mt-n3">
                            <input type="text" value="{{$kpi->target}}" class="form-control" name="target" readonly>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="start_date"><p>New Current Position</p></label>
                            <!--                        <div v-if="editCategoryData.image.name">-->
                            <div class="mt-n3">
                                <input type="text" name="current" class="form-control" placeholder="Enter Numerical new Current Position" value="{{$kpi->current}}">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right">Edit KPI</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>

        </div>
    </div>
@endsection
