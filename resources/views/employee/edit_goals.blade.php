@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    @include('includes.employee_header')
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-7">
                <h3 style="color:#727272;">Goal</h3>
                <form action="{{route('goal.update', $goal->id)}}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <div class="form-group">
                        <label for="description"><p>Description</p></label>
                        <!--                        <div v-if="editCategoryData.image.name">-->
                        <div class="mt-n3">
                            <textarea class="form-control" name="description" required>
                                {{$goal->description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="start_date"><p>Start Date</p></label>
                            <!--                        <div v-if="editCategoryData.image.name">-->
                            <div class="mt-n3">
                                <input type="text" name="start_date" class="form-control" placeholder="Start Date" value="{{$goal->start_date}}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date"><p>End Date</p></label>
                            <!--                        <div v-if="editCategoryData.image.name">-->
                            <div class="mt-n3">
                                <input type="date" name="end_date" class="form-control" placeholder="End Date">

                            </div>
                        </div>

                    </div> <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="status">
                                <option selected>Choose...</option>
                                <option value="started">Started</option>
                                <option value="in_process">In Process</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Percentage Completed</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="percentage_complete">
                                <option selected>Choose in %...</option>
                                <option value="10">0</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="10">40</option>
                                <option value="20">50</option>
                                <option value="30">60</option>
                                <option value="10">70</option>
                                <option value="20">80</option>
                                <option value="30">90</option>
                                <option value="30">100</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info float-right">Edit Goal</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
