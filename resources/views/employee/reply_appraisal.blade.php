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
                    <h2><i class="fa fa-map-marker red"></i><strong>Respond to Appraisals</strong></h2>

                    <div class="panel-actions">

                        {{--                        <a href="index.html#" class="btn-minimize"><i class="fa fa-plus-circle"></i></a>--}}
                        {{--                        <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body-map">
                     <div class="row">
                         <div class="col-md-8 offset-1">
                             <form action="{{route('appraisal.update', $appraisal->id)}}" method="post" >
                                 @csrf
                                 {{ method_field('PUT') }}
                                 <input type="hidden" value="{{$appraisal->id}}" name="id">
{{--                                 <input type="hidden" value="{{$appraisal->date_requested}}" name="date_requested">--}}
{{--                                 <input type="hidden" value="{{$appraisal->deadline_date}}" name="deadline_date">--}}
                                 <div class="form-group">
                                     <label for="name" class= "col-form-label text-md-right">{{ __('Appraisal') }}</label>
                                 </div>
                                 <div class="form-group">
                                         <textarea class="form-control @error('subject') is-invalid @enderror"  name="subject">
                                             {{$appraisal->subject}}
                                         </textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="col-form-label ">{{ __('Response') }}</label>

                                 </div>
                                 <div class="form-group">
                                         <textarea class="form-control @error('name') is-invalid @enderror" name="reply" required>
                                             {{$appraisal->reply}}
                                         </textarea>
                                 </div>
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-info btn-block">Respond to Appraisal</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <h2> I am an employee!</h2>
@endsection
