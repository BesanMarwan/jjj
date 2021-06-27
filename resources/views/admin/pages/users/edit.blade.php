@extends('admin.layouts.admin')
@section('css')
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
    @toastr_css
@section('title')
    تعديل صلاحيات المستخدم
@stop
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">تعديل صلاحيات المستخدم</h6>
            <div class="ml-auto">
                <a href="{{ route('users.index') }}" class="btn btn-success">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">المستخدمين</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="parsley-style-1" id="selectForm2" autocomplete name="selectForm2"
                  action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT') }}

                <div class="">
                    <div class="row mb-3">

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>صورة البروفايل: </label>
                            @if ($user->user_image != '')
                                <img src="{{ asset($user->user_image) }}" class="img-fluid" height="320px">
                            @else
                                <img src="{{ asset('images/users/default.png') }}" class="img-fluid">
                            @endif
                        </div>
                        @error('user_image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>البريد الالكتروني: <span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm mb-3"
                                   data-parsley-class-handler="#lnWrapper" disabled value="{{$user->email}}" name="email" required="" type="email">
                        </div>
                        @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>اسم المستخدم(كامل ): <span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm mb-3"
                                   data-parsley-class-handler="#lnWrapper" disabled value="{{$user->name}}" name="name" required="" type="text">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>اسم البديل: <span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm mb-3"
                                   data-parsley-class-handler="#lnWrapper" disabled value="{{$user->username}}" name="username" required="" type="text">
                        </div>
                        @error('username')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0 mt-0" id="lnWrapper">
                            <label>نبذة عن المستخدم :</label>
                            <textarea class="form-control form-control-sm mb-3" rows="5" disabled data-parsley-class-handler="#lnWrapper"
                                      name="bio" >{{$user->bio}}</textarea>
                        </div>
                        @error('bio')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>


                <div class="row row-sm  mb-3">
                    <div class="col-lg-6">
                        <label class="form-label">حالة المستخدم</label>
                        <select name="status" id="select-beast" class="form-control nice-select custom-select">
                            <option value="1" {{$user->status?'selected':''}}>مفعل</option>
                            <option value="0" {{$user->status?'':'selected'}}>غير مفعل</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">صلاحية  المستخدم</label>
                        {!! Form::select('roles_name[]', $roles,$userRole, array('class' => ['form-control','nice-select','custom-select'],'multiple','id'=>'select-beast')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button class="btn btn-success pd-x-20" type="submit">تحديث</button>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div></div></div></div>
    <!-- row closed -->
    <!-- Container closed -->
    <!-- main-content closed -->
@endsection
@section('js')


    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('js/form-validation.js')}}"></script>
    @toastr_js
    @toastr_render

@endsection
