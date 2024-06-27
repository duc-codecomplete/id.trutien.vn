@extends('layouts.master')
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Nạp xu vào tài khoản</h1>
    </div>
</div>
<hr style="width: 100%; border-style: dashed;">
<div class="row g-4 settings-section text-center">
    <div class="col-12 col-md-12">
        <h3 class="section-title">Quét mã QR bên dưới</h3>
        <div class="section-intro">
            <img width="300" src="https://img.vietqr.io/image/mbbank-0975832648-compact2.jpg?addInfo=TT{{strtoupper(Auth::user()->username)}}&accountName=Tru%20Tien%20Viet%20Nam" alt="">
        </div>
        <br>
        <p style="color:green">Lưu ý: Tuyệt đối không thay đổi nội dung giao dịch để quá trình thanh toán tự động được thực hiện</p>
    </div>
</div>

@endsection