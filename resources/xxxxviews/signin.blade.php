@extends('layouts.auth')
@section('content')
<div class="max-w-[800px] mx-auto px-6">
    <div class="grid shadow-xl rounded-xl border bg-white">
        <form class="py-4 shadow-2xl" action="" method="POST">
            <div class="px-2 pt-1.5 pb-1 relative">
                <div class="text-2xl uppercase text-center">Đăng Nhập</div>
            </div>
            @csrf
            <div class="p-4">
                @if(Session::has('error'))
                <p class="alert alert-danger" style="text-align: center;color:red">{{ Session::get('error') }}
                </p>
                @endif
            </div>
            <div class="p-4">
                <div class="mt-6">
                    <div>
                        <input class="form-control" name="login" placeholder="Tên đăng nhập">
                    </div>
                </div>
                <div class="mt-6">
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="text-right mt-6">
                    <div>
                        <a href="javascript:void(0)">Quên mật khẩu ?</a>
                    </div>
                    <div>
                        <a href="/dang-ky">Đăng ký tài khoản mới ?</a>
                    </div>
                </div>
            </div>
            <div class="mx-4">
                <button type="submit" class="bg-teal-600 text-white rounded-md w-full py-3">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
@endsection