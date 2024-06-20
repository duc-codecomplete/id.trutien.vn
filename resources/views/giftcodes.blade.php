@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Danh sách giftcode</h1>
        </div>
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

<div class="row g-4">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Giftcode</th>
                <th scope="col">Phần thưởng</th>
                <th scope="col">Ngày hết hạn</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($giftcodes as $item)
              <tr>
                <td>{{ $item->giftcode }}</td>
                <td>{{ $item->award }}</td>
                <td>{{\Carbon\Carbon::parse($item->expired)->format("d/m/Y")}}</td>
                <td>
                    @if ($item->beUsedByUser(Auth::user()->id))
                    <button class="btn btn-success" disabled>Đã sử dụng</button>
                    @else
                    <a href="/giftcodes/{{ $item->id}}/using" class="btn btn-danger">Sử dụng</a>
                    @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection