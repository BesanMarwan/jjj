@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title','اضافة صفحة')

@section('content')
    <!-- row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">اضافة صفحة</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-success">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">الاخبار</span>
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

                <form method="post" class="m-t-30 " action="{{route('admin.pages.store')}}" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <h6>عنوان الصفحة :<span class="text-danger">*</span></h6>
                        <div class="controls">
                            <input type="text" name="title" class="form-control" value="" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" >
                            <div class="help-block"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <h6>رابط الصفحة :<span class="text-danger">*</span></h6>
                        <div class="controls">
                            <input type="text" name="slug" class="form-control" value="" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" >
                            <div class="help-block"></div>
                        </div>
                    </div>
                    </div>
</div>

                    <div class="form-group">
                        <h6>  محتوى الصفحة : <span class="text-danger">*</span></h6>
                        <div class="controls">
                            <textarea class="form-control summernote" name="content" rows="8" required="" aria-invalid="false"></textarea>
                            <div class="help-block"></div>
                        </div>
                    </div>




                        <button type="submit" class="btn btn-primary" name="">اضافة</button>
                        <button type="reset" class="btn btn-danger">تراجع</button>

                </form>
            </div>
        </div>


    </div>
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
