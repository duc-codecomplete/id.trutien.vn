@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row gy-4">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Thông Tin Tài Khoản</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>ID</strong></div>
                                <div class="item-data">HAGL{{ $user->userid }}</div>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                    <!--//item-->
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Tên đăng nhập</strong></div>
                                <div class="item-data">{{ $user->username }}</div>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                    <!--//item-->
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Email</strong></div>
                                <div class="item-data">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                    <div class="item py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Mật khẩu</strong></div>
                                <div class="item-data">••••••••</div>
                            </div>
                            <!--//col-->
                            <div class="col text-end">
                                <a class="btn btn-sm btn-danger" href="/doi-mat-khau" style="color:white">Thay đổi</a>
                            </div>
                            <!--//col-->
                        </div>
                        <!--//row-->
                    </div>
                </div>

            </div>
        </div>
        <!--//col-->
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-list-stars" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M2.242 2.194a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.28.28 0 0 0-.094.3l.173.569c.078.256-.213.462-.423.3l-.417-.324a.27.27 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.28.28 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.27.27 0 0 0 .259-.194zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.28.28 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.27.27 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.28.28 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.27.27 0 0 0 .259-.194zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.28.28 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.27.27 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.28.28 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.27.27 0 0 0 .259-.194z" />
                                </svg>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Danh sách nhân vật</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    @if(count(Auth::user()->chars()) == 0)
                        <h4 class="app-card-title">Bạn chưa tạo nhân vật nào</h4>
                    @else
                    @foreach (Auth::user()->chars() as $item)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title" style="color:blue">{{ $item->name }} <small style="font-size: 14px; color: black">{{ Auth::user()->main_id == $item->char_id ? "(Nhân vật chính)" : ""}}</small></h5>
                            <p class="card-text char">ID: {{ $item->char_id }}</p>
                            <p class="card-text char">Môn phái: {{ $item->getClass() }}</p>
                            <p class="card-text char">Giới tính: {{ $item->gender }}</p>
                            <p class="card-text char">Điểm PK: {{ $item->pk_value }}</p>
                            <br>
                            @if(Auth::user()->main_id != $item->char_id)
                            <a href="/set_main_char/{{$item->char_id}}" class="btn btn-sm btn-success" style="color:white">Đặt làm nhân vật chính</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .char {
        margin-bottom: 0 !important;
        font-size: 14px !important;
    }
    footer {
        display: none;
    }
</style>
@endsection