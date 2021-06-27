@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title')
    الاقسام
@stop
@endsection
@section('page-header','لاقسام الرئيسية')
    <!-- breadcrumb -->
@section('PageTitle','الاقسام الرئيسية')
@section('content')
    <!-- row -->
    <div class="row">


        @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @can('اضافة قسم')
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        اضافة قسم
                    </button>
                        @endcan
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> اسم القسم</th>
                                <th> الوصف </th>
                                <th>الحالة  </th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($categories))
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->getDescription() }}</td>
                                    <td>{{ $category->getStatus() }}</td>
                                    <td>
                                        @can('تعديل قسم')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $category->id }}"
                                                title="تعديل"><i class="fa fa-edit"></i></button>
                                        @endcan
                                        @can('حذف قسم')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $category->id }}"
                                                title="حذف القسم"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>

                                <!-- edit_modal_Category -->
                                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تعديل القسم
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('admin.categories.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">اسم القسم
                                                                :</label>
                                                            <input id="Name" type="text" name="name"
                                                                   class="form-control"
                                                                   value="{{ $category->name}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $category->id }}">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">الوصف
                                                            :</label>
                                                        <textarea class="form-control" name="description"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $category->description }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-success">تعديل البيانات</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حدف القسم
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.categories.delete', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
هل انت متاكد من حدف القسم ؟!                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $category->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">حدف القسم</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Category -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            اضافة القسم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="mr-sm-2">اسم القسم
                                        :</label>
                                    <input id="name" type="text" name="name" class="form-control">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">الوصف
                                    :</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-success">حفظ البيانات</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
