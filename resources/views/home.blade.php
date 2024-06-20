@extends('layouts.master')
@section('content')
<div class="bg-teal-500 px-2 pt-1.5 pb-1 relative title-content" style="z-index: 1">
    <div class="text-white text-2xl uppercase">Thông tin tài khoản</div>
</div>
<div class="p-4">
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label>ID</label>
            <input type="text" class="form-control" value="{{ $user->userid }}" readonly="">
        </div>
        <div>
            <label>User Name</label>
            <input type="text" class="form-control" value="{{ $user->username }}" readonly="">
        </div>
    </div>
    <div class="mt-6">
        <div>
            <label>Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
    </div>
    <div class="mt-6">
        <div>
            <label>Phone</label>
            <input type="number" class="form-control" value="{{ $user->phone }}" >
        </div>
    </div>
</div>
@endsection