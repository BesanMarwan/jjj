@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title')
    الصفحات الثابتة
@stop
@endsection
@section('page-header','الصفحات الثابتة')
    <!-- breadcrumb -->
@section('PageTitle','الصفحات الثابتة ')
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
                     @can('الصفحات الثابتة')
                    <a href="{{route('admin.pages.create')}}" class="button x-small "  >
                     اضافة صفحة
                    </a>
                        @endcan
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> اسم الصفحة</th>
                                <th>وقت الانشاء  </th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($staticPages))
                            @foreach ($staticPages as $staticPage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staticPage->title }}</td>
                                    <td>{{ $staticPage->created_at->format('d-m-Y ') }}</td>
                                    <td>
                                        @can('تعديل الصفحات')
                                        <a href="{{route('admin.pages.edit',$staticPage->id)}}" class="btn  btn-info btn-sm"
                                                title="تعديل"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('حدف الصفحة')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $staticPage->id }}"
                                                title="حدف "><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $staticPage->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تعديل الصفحة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- add_form -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $staticPage->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حدف الصفحة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.pages.delete', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
هل انت متاكد من حدف الصفحة ؟!                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $staticPage->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">حدف الصفحة</button>
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



    </div>

    <!-- row closed -->
  <!-- row closed -->
  @endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,

            });
        }    @toastr_js
    @toastr_render
@endsection
