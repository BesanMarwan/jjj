@extends('admin.layouts.admin')
    @toastr_css


@section('title','اضافة خبر')

@section('content')
    <!-- row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">اضافة خبر</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success">
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

                                        <form method="post" class="m-t-30 " action="{{route('admin.posts.store')}}" enctype="multipart/form-data">

@csrf
                                            <div class="form-group">
                                                <h6>عنوان الخبر :<span class="text-danger">*</span></h6>
                                                <div class="controls">
                                                    <input type="text" name="title" class="form-control" value="" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" >
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h6>  الوصف : <span class="text-danger">*</span></h6>
                                                <div class="controls">
                                                    <textarea class="form-control summernote" name="cont" rows="8" required="" aria-invalid="false"></textarea>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h6 for="exampleInputEmail1">الكلمات الدلالية</h6>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="" name="meta_data">
                                                <small id="name13" class="badge badge-default badge-danger form-text text-white  "> ضع علامة # قبل كل كلمة دلالية</small>
                                            </div>
<div class="row">
<div class="col-md-6">
                                            <div class="form-group">
                                                <h6>القسم <span class="text-danger">*</span></h6>
                                                <div class="controls">
                                                    <select name="category" class="form-control form-control-lg w-100" id="exampleFormControlSelect1" required="" aria-invalid="false">
                                                        <option value="0" disabled selected> اختيار القسم</option>
                                                             @if(isset($categories))
                                                                 @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                 @endforeach
                                                                 @endif
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div></div></div>
<div class="col-md-6">
                                            <div class="form-group">
                                                <h6>التعليق ع البوست :</h6>
                                                <select name="comment" class="form-control form-control-lg w-100" id="exampleFormControlSelect1" required="" aria-invalid="false">
                                                    <option value="1" selected>مفعل</option>
                                                    <option value="0" >غير مفعل</option>
                                                </select>

                                            </div></div></div>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <h6>صورة الخبر</h6>
                                                <input type="file" name="uploadfile" class="form-control">
                                            </div></div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <h6> وصف للصورة  :</h6>
                                                <div class="controls">
                                                    <input type="text" name="img_title" class="form-control form-control-lg" value="" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" >
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            </div>



                                                <button type="submit" class="btn btn-primary mr-5 ml-3 button py-2 px-3" name="">اضافة</button>
                                                <button type="reset" class=" btn btn-danger  py-2 px-3">تراجع</button>

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
