@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Vật phẩm bày bán</h1> <small style="color:red">*Lưu ý: chọn nhân vật mặc
                định trước khi mua, nếu chọn sai, chúng tôi sẽ không chịu trách nhiệm</small>
                <p><small style="">*Nếu không thấy nhân vật, <a href="/update_char">bấm vào đây</a> để cập nhật</small></p>
        </div>
    </div>
    <form class="row" action="/set_main_char" method="POST">
        @csrf
        <div class="col-4">
            <select name="main_id" class="form-control">
                <option value="">---Chọn nhân vật---</option>
                @foreach (Auth::user()->chars() as $item)
                <option value="{{ $item['char_id'] }}" @php if ($item["char_id"] == Auth::user()->main_id) {
                    echo "selected";
                } @endphp>{{ $item['char_id'] }} - {{ $item['name'] }} </option>
                @endforeach
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
                            <li><span class="">Xếp chồng:</span> {{ $item->stack }}</li>
                            <li><span class="">Đã bán:</span> {{ $item->getSell() }}</li>
                        </ul>
                    </div>
                    <br>
                </div>
                <form class="row p-4" action="" method="POST">
                    @csrf
                    <div class="col-10">
                        <input type="number" min="1" max="{{ $item->stack }}" required name="quantity" class="form-control quantity"
                            placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->itemid }}" name="itemid" class="form-control"
                            placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->id }}" name="shop_id" class="form-control"
                            placeholder="Số lượng">
                    </div>
                    <div class="col-2">
                        <button onclick="return confirm('Bạn có chắc chắn muốn mua không?')" type="submit" class="btn btn-sm btn-primary text-center">Mua</button>
                    </div>
                </form>

            </div>
            <!--//app-card-->
        </div>
        @endforeach
    </div>
</div>
@endsection