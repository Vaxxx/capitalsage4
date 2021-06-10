@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    @include('includes.employee_header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">
            <div class="card">
                <div class="card-header">
                    <h4>Respond to Appraisal</h4>


                </div>
                <div class="card-body">
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
                                         <textarea id="editor" class="form-control @error('subject') is-invalid @enderror"  name="subject">
                                             {{$appraisal->subject}}
                                         </textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="col-form-label ">{{ __('Response') }}</label>

                                 </div>
                                 <div class="form-group">
                                         <textarea id="editor" class="form-control @error('name') is-invalid @enderror" name="reply" required>
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
