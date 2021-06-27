@extends('admin.layouts.admin')
@section('css')
    @toastr_css
@section('title')
    المستخدمين
@stop
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                <!-- <button type="button" class="button x-small" onclick="Location.href='{{route('admin.posts.create')}}'" >
                        اضافة خبر
                    </button>-->
                    @can('اضافة خبر')
                        <a href="{{route('users.create')}}" class=" button x-small btn btn-sucess">
                            اضافة مستخدم
                        </a>
                    @endcan
                    <br><br>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <thead>
                            <tr>
                                <th>صورة المستخدم</th>
                                <th>الاسم </th>
                                <th>البريد الالكتروني </th>
                                <th>الحالة</th>
                                <th>تاريخ الاضافة</th>
                                <th class="text-center" style="width: 100px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        @if ($user->user_image != '')
                                            <img src="{{ asset($user->user_image) }}" width="60">
                                        @else
                                            <img src="{{ asset('images/users/default.png') }}" width="60">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('users.show',$user->id)}}">{{ $user->name }}</a>
                                        <p class="text-gray-400"><b>{{ $user->username }}</b></p>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>{{ $user->status() }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td>
                                            <a  href="{{route('users.edit' , $user->id)}}" class="btn btn-info btn-sm"
                                                title="تعديل صلاحية المستخدم"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $user->id }}"
                                                    title="حدف المستخدم"><i
                                                    class="fa fa-trash"></i></button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                                                        </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="6">
                                    <div class="float-right">
                                        {!! $users->appends(request()->input())->links() !!}
                                    </div>
                                </th>
                            </tr>
                            </tfoot>
                            <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حدف المستخدم
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                هل انت متاكد من حدف المستخدم ؟!                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                                                                                       value="{{ $user->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">الغاء</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">حدف المستخدم</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </table>                    </div>
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
