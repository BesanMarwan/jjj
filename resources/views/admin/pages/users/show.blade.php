@extends('admin.layouts.admin')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-success">المستخدم ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('users.index') }}" class="btn btn-success">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">المستخدمين</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td colspan="4">
                        @if ($user->user_image != '')
                            <img src="{{ asset($user->user_image) }}" class="" height="320px">
                        @else
                            <img src="{{ asset('images/users/default.png') }}" class="img-fluid">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>الاسم</th>
                    <td>{{ $user->name }} ({{ $user->username }})</td>
                    <th>البريد الالكتروني </th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>نبذة عن المستخدم</th>
                    <td>{{ $user->bio() }}</td>
                    <th>الحالة</th>
                    <td>{{ $user->status() }}</td>
                </tr>
                <tr>
                    <th>تاريخ الانشاء</th>
                    <td>{{ $user->created_at->format('d-m-Y h:i a') }}</td>
                    <th>الصلاحيات</th>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
{{--                    <td>{{ $user->posts_count }}</td>--}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
