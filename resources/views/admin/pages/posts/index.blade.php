@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title','الاخبار')
    <!-- breadcrumb -->
@section('PageTitle')
    عرض الاخبار
@stop
@endsection
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
                   <!-- <button type="button" class="button x-small" onclick="Location.href='{{route('admin.posts.create')}}'" >
                        اضافة خبر
                    </button>-->
                        @can('اضافة خبر')
                        <a href="{{route('admin.posts.create')}}" class=" button x-small btn btn-sucess">
                            اضافة خبر
                        </a>
                        @endcan
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان الخبر</th>
                                <th>صورة الخبر </th>
                                <th>القسم</th>
                                <th>تاريخ النشر</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($posts))
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" height="150px" width="150px" alt="">
                                            @endforeach
                                    </td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->created_at->format('d-m-Y h:i a') }}</td>
                                    <td>
                                        @can('تعديل الاخبار')
                                        <a  href="{{route('admin.posts.edit' , $post->id)}}" class="btn btn-info btn-sm"
                                         title="تعديل"><i class="fa fa-edit"></i></a>
                                           @endcan
                                        @can('حدف خبر')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $post->id }}"
                                                title="حدف القسم"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('admin.posts.delete', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
هل انت متاكد من حدف الخبر ؟!                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $post->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">حدف الخبر</button>
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
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
