@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Chuyển đổi KNB vào game</h1><small style="color:red">*Tỉ lệ: 100 xu = 300 KNB</small>
                <p><small style="">*Mỗi lần nạp tối thiểu là 50 xu</p>
        </div>
    </div>
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small>{{ Session::get('error') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <small>{{ Session::get('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form class="row" action="" method="POST">
        @csrf
        <div class="col-4">
            <input min="50" name="cash" required class="form-control" type="number" max="{{ Auth::user()->balance}}" oninvalid="this.setCustomValidity('Số xu nạp phải nhỏ hơn hoặc bằng số dư hiện có')"
            oninput="this.setCustomValidity('')">
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-sm btn-danger text-center">Nạp KNB</button>
        </div>
    </form>
    <br>
    <!--//row-->

    <div class="row g-4">
    </div>
</div>
@endsection