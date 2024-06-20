@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Vật phẩm bày bán</h1> <small style="color:red">*Lưu ý: chọn nhân vật mặc
                định trước khi mua, nếu không chọn, chúng tôi sẽ không chịu trách nhiệm</small>
                <p><small style="">*Nếu không thấy nhân vật, <a href="/shops">bấm vào đây</a> để cập nhật</small></p>
        </div>
    </div>
    <form class="row" action="" method="POST">
        @csrf
        <div class="col-4">
            <select name="char_id" class="form-control">
                <option value="">---Chọn nhân vật để mua---</option>
                <option value="">AAAA</option>
                <option value="">BBBB</option>
            </select>
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-sm btn-danger text-center">Chọn nhân vật</button>
        </div>
    </form>
    <br>
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small>{{ Session::get('error') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--//row-->

    <div class="row g-4">
        @foreach ($shops as $item)
        <div class="col-12 col-md-12 col-xl-6 col-xxl-6">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3 has-card-actions">

                    <h2 class="app-doc-title truncate mb-0" style="font-size:18px !important"><a href="#file-link">{{
                            $item->name }}</a></h2>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                            <li><span class=""><i class="fa fa-dollar"></i> Giá:</span> {{ $item->price }} xu</li>
                            <li><span class="">Mô tả:</span> {{ $item->description }}</li>
                            <li><span class="">Đã bán:</span> 30</li>
                        </ul>
                    </div>
                    <br>
                </div>
                <form class="row p-4" action="" method="POST">
                    @csrf
                    <div class="col-10">
                        <input type="number" min="1" required name="quantity" class="form-control"
                            placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->itemid }}" name="itemid" class="form-control"
                            placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->id }}" name="shop_id" class="form-control"
                            placeholder="Số lượng">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-sm btn-primary text-center">Mua</button>
                    </div>
                </form>

            </div>
            <!--//app-card-->
        </div>
        @endforeach
    </div>
</div>
@endsection