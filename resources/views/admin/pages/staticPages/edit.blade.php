@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title','تعديل الصفحة')

@section('content')
    <!-- row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">تعديل الصفحة</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-success">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">رجوع</span>
                </a>
            </div>
        </div>
        <div class="card-body">


            @if ($errors->any())
                <div class="error">{{ $errors->first('Name') }}</div>
            @endif



            <div class="col-xl-12 mb-30">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('admin.pages.update',$staticPage->id) }}" method="post">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       class="mr-sm-2">عنوان الصفحة
                                    :</label>
                                <input id="Name" type="text" name="title"
                                       class="form-control"
                                       value="{{ $staticPage->title}}"
                                       required>
                                <input id="id" type="hidden" name="id" class="form-control"
                                       value="{{ $staticPage->id }}">
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                        <h6>رابط الصفحة :<span class="text-danger">*</span></h6>
                        <div class="controls">
                            <input type="text" name="slug" class="form-control" value="{{$staticPage->slug}}" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" >
                            <div class="help-block"></div>
                        </div>
                    </div>
</div>
                        </div>
                        <div class="form-group">
                            <h6>  محتوى الصفحة : <span class="text-danger">*</span></h6>
                            <div class="controls">
                                <textarea class="form-control summernote" name="content" rows="8" required="" aria-invalid="false">{{$staticPage->content}}</textarea>
                                <div class="help-block"></div>
                            </div>
                        </div>
<div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">الغاء</button>
                                <button type="submit"
                                        class="btn btn-success">تعديل الصفحة</button>
                            </div>
                        </div>
                    </form>
            </div>        </div>

    <!-- row closed -->
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,

            });
        });
    </script>
    @toastr_js
    @toastr_render
@endsection
