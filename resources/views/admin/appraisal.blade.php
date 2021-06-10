@extends('layouts.member_template')
@section('sidebar')
    @include('includes.admin_sidebar')
@endsection
@section('content')
    @include('includes.admin_header')
    <div class="container">
        <div class="row">
            <div class="col-md-11 offset-1">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="text-center">Add a KPI</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.appraisalStore') }}" enctype="multipart/form-data">
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
                <textarea id="editor" rows="5" cols="20" class="form-control @error('subject') is-invalid @enderror" name="subject" required autocomplete="subject">

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
