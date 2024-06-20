@extends('layouts.auth')
@section('content')
<div class="max-w-[800px] mx-auto px-6">
    <div class="grid shadow-xl rounded-xl border bg-white">
        <form class="py-4 shadow-2xl" action="" method="POST">
            <div class="px-2 pt-1.5 pb-1 relative">
                <div class="text-2xl uppercase text-center">ĐĂNG KÝ TÀI KHOẢN</div>
            </div>
            @if ($errors->any())
            <div class="p-4">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


            @endif
            <div class="p-4">
            @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
        </div>
            <div class="p-4">
                @csrf
                <div class="mt-6">
                    <div>
                        <input type="text" name="login" required class="form-control" value="{{ old('login') }}" placeholder="Tài khoản">
                    </div>
                </div>
                <div class="mt-6">
                    <div>
                        <input type="password" name="passwd" required class="form-control" value="" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="mt-6">
                    <div>
                        <input type="password" name="passwdConfirm" required class="form-control" value="" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="mt-6">
                    <div>
                        <input type="email" name="email" required class="form-control" value="{{ old('login') }}" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="mx-4">
                <button type="submit" class="bg-teal-600 text-white rounded-md w-full py-3">Đăng ký</button>
            </div>
        </form>
    </div>
</div>
@endsection