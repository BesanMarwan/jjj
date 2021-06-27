@extends('admin.layouts.admin')
  @toastr_css

@section('PageTitle','اضافة الصلاحيات')



@section('content')
    <!-- row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">اضافة صلاحية</h6>
            <div class="ml-auto">
                <a href="{{ route('roles.index') }}" class="btn btn-success">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">الصلاحيات</span>
                </a>
            </div>
        </div>
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




    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <div class="form-group">
                                <p>اسم الصلاحية :</p>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- col -->
                        <div class="col-lg-10 mb-3">
                            <ul id="treeview1">
                                <li class="mb-1"><a href="#" >الصلاحيات</a>
                                    <ul>
                                        </li>
                                        @foreach($permission as $value)
                                            <label
                                                style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>

                                            @endforeach
                                            </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                        <div class="col-xs-12 col-sm-12 col-md-12 ">

                            <button type="submit" class="btn btn-primary mr-5 ml-3 button py-2 px-3" name="">اضافة</button>
                            <button type="reset" class=" btn btn-danger  py-2 px-3">تراجع</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    {!! Form::close() !!}

    toastr_js
    @toastr_render
@endsection
