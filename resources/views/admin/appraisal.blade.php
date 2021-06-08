@extends('layouts.member_template')
@section('sidebar')
    @include('includes.admin_sidebar')
@endsection
@section('content')
    @include('includes.admin_header')
    <form method="POST" action="{{ route('admin.appraisalStore') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Recipient') }}</label>
            <div class="col-md-6">
{{--                <input id="recipient" type="text" class="form-control @error('recipient') is-invalid @enderror" name="recipient" value="{{ old('recipient') }}" required autocomplete="name" autofocus>--}}
                <select name="recipient" class="form-control" id="recipient">
                    @foreach($users as $user)
                      <option value="{{$user->email}}">{{$user->email}}</option>
                    @endforeach
                </select>
                @error('recipient')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <input type="hidden" name="donor" value="{{Auth::user()->role}}">

        <div class="form-group row">
            <label for="date_requested" class="col-md-4 col-form-label text-md-right">{{ __('Date Requested') }}</label>
            <div class="col-md-6">
                <input id="dateRequested" type="date" class="form-control @error('dateRequested') is-invalid @enderror" name="date_requested" value="{{ old('dateRequested') }}" required autocomplete="dateRequested">

                @error('dateRequested')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="deadline_date" class="col-md-4 col-form-label text-md-right">{{ __('Deadline Date') }}</label>
            <div class="col-md-6">
                <input id="deadlineDate" type="date" class="form-control @error('deadlineDate') is-invalid @enderror" name="deadline_date" value="{{ old('deadlineDate') }}" required autocomplete="deadlineDate">

                @error('deadlineDate')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

            <div class="col-md-6">
                <textarea  rows="5" cols="20" class="form-control @error('subject') is-invalid @enderror" name="subject" required autocomplete="subject">

                </textarea>
                @error('subject')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Appraisal') }}
                </button>
            </div>
        </div>
    </form>

@endsection
@section('scripts')

    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>
@endsection
