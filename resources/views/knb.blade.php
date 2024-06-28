@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Chuyển đổi KNB vào game</h1><small style="color:red">*Tỉ lệ: 1000 xu = 3
                KNB</small>
            <p><small style="">*Mỗi lần nạp tối thiểu là 50000 xu</p>
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
            <input min="50000" name="cash" required class="form-control" type="number" max="{{ Auth::user()->balance}}"
                oninvalid="this.setCustomValidity('Số xu nạp phải nhỏ hơn hoặc bằng số dư hiện có')"
                oninput="this.setCustomValidity('')">
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-sm btn-danger text-center">Nạp KNB</button>
        </div>
    </form>
    <br>
    <!--//row-->

    <div class="row g-4">
        <div style="margin-top:20px"></div>
        <h3 class="text-center">BẢNG CẤP ĐỘ VIP</h3>
        <table class="table table-bordered table-hover" align="center" border="1" cellspacing="0" cellpadding="0">
            <tbody>
                <tr align="center">
                    <th>Cấp VIP</th>
                    <th>Số KNB cần </th>
                    <th>Số xu cần</th>
                </tr>
                <tr align="center">
                    <td>V1</td>
                    <td>100</td>
                    <td>{{number_format(ceil(100/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V2</td>
                    <td>400</td>
                    <td>{{number_format(ceil(400/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V3</td>
                    <td>800</td>
                    <td>{{number_format(ceil(800/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V4</td>
                    <td>1500</td>
                    <td>{{number_format(ceil(1500/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V5</td>
                    <td>2500</td>
                    <td>{{number_format(ceil(2500/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V6</td>
                    <td>5000</td>
                    <td>{{number_format(ceil(5000/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V7</td>
                    <td>8000</td>
                    <td>{{number_format(ceil(8000/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td>V8</td>
                    <td>15000</td>
                    <td>{{number_format(ceil(15000/3) * 1000)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection