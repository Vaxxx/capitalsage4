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
                        <h3 class="text-center">Add a KPI</h3>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.kpiStore') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Recipient') }}</label>
            <div class="col-md-6">
{{--                <input id="recipient" type="text" class="form-control @error('recipient') is-invalid @enderror" name="recipient" value="{{ old('recipient') }}" required autocomplete="name" autofocus>--}}
                <select name="recipient" class="form-control" id="recipient" required>
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

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Objective') }}</label>
            <div class="col-md-6">
                <input id="objective" required type="text" placeholder="Enter an Objective" class="form-control @error('objective') is-invalid @enderror" name="objective" value="{{ old('objective') }}"  autocomplete="objective" autofocus>

                @error('objective')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Target') }}</label>
            <div class="col-md-6">
                <input id="target" type="text" placeholder="Enter a Numerical Target" class="form-control @error('target') is-invalid @enderror" name="target" value="{{ old('target') }}" required autocomplete="target" autofocus>

                @error('target')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Current') }}</label>
            <div class="col-md-6">
                <input id="current" required type="text" placeholder="Enter a Numerical Current Stage" class="form-control @error('current') is-invalid @enderror" name="current" value="{{ old('current') }}" required autocomplete="current" autofocus>

                @error('current')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
            <div class="col-md-6">
                <input id="comment" required type="text" placeholder="Enter a Comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment" autofocus>

                @error('comment')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date ') }}</label>
            <div class="col-md-6">
                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" required>

                @error('date')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="inputGroupSelect01">Grade</label>
            <div class="form-control col-md-6">
                <input type="text" name="grade" value="N/A" readonly>
{{--                <select class="custom-select" id="inputGroupSelect01" name="grade" required>--}}
{{--                    <option selected>Grade...</option>--}}
{{--                    <option value="n/a">Not Available</option>--}}
{{--                    <option value="unsatisfactory">Unsatisfactory</option>--}}
{{--                    <option value="needs_improvement">Needs Improvement</option>--}}
{{--                    <option value="proficient">Proficient</option>--}}
{{--                    <option value="commendable">Commendable</option>--}}
{{--                    <option value="excellent">Excellent</option>--}}
{{--                </select>--}}

                @error('grade')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send KPI') }}
                </button>
            </div>
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>

    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        /**
         * using ckeditor as a wysiwyg editor and also to upload images and files
         * step 1. add the link above (cdn link)
         * step 2. copy ckeditor into your public dir
         * step3. ensure your textarea has an id of editor
         * step3. add the codes below=> CKEditor.replace...
         * step4. create a post route in web.php admin.upload=>Route::post('admin_upload_files', [AdminController::class, 'upload'])->name('admin.upload');
         * step5. add an upload function in your controller
                                         * if($request->hasFile('upload')){
                                      $originName = $request-file('upload')->getClientOrigninalName();
                                      $fileName = pathinfo($originName, PATHINFO_FILENAME);
                                      $extension = $request->file('upload')->getClientOrigninalExtension();
                                      $fileName = $fileName.'_'.time().'.'.$extension;

                                      $request->file('upload')->move(public_path('img').$fileName);

                                      $CKEDITORFuncNum = $request->input('CKEDITORFuncNum');
                                      $url = asset('public/img/'.$fileName);
                                      $msg = 'upload was successful'
                                      {{--//$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEDITORFuncNum, '$url', '$msg')//</script>"--}}
                                    @header('Content-type: text/html; charset-utf-8');
                                    echo $response;
                                    }
         * step5. send files to database
         */
        CKEDITOR.replace( 'editor',{
            extraPlugins :  ['filebrowser','popup'],
            filebrowserUploadUrl: "{{route('admin.upload',['_token' => csrf_token()])}}",
            filebrowserBrowseUrl: "{{route('admin.upload',['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        } );
    </script>
@endsection
