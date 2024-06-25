@extends('layouts.master')
@push('meta')
    <meta http-equiv="refresh" content="5">
@endpush
@section('content')
<style>
    .rounded {
    border-radius: var(--bs-border-radius) !important;
}
.bg-light {
    --bs-bg-opacity: 1;
    background-color: #f5f7fb !important;
}
.py-2 {
    padding-bottom: .5rem !important;
    padding-top: .5rem !important;
}
.px-3 {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
}
.me-3 {
    margin-right: 1rem !important;
}

.position-relative {
    max-height: 1000px;
    overflow: auto;   
}
</style>
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Server Chat Logs</h1><a class="badge bg-primary ms-2" href="#"
            target="_blank">Pro Component <i class="fas fa-fw fa-external-link-alt"></i></a>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-12 col-xl-12">
                {{-- <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="flex-grow-1 ps-3">
                            <strong>GM</strong>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-lg me-1 px-3"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-phone feather-lg">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg></button>
                            <button class="btn btn-info btn-lg me-1 px-3 d-none d-md-inline-block"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-video feather-lg">
                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                </svg></button>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="flex-grow-0 py-3 px-4 border-top">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your message" readonly>
                        <button class="btn btn-primary" disabled>Send</button>
                    </div>
                </div> --}}
                <div class="position-relative">
                    <div class="chat-messages p-4">
                        @foreach (array_reverse($chat) as $item)
                        @if($item["channel "] == "1")
                        <div class="chat-message-left pb-4">
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                <div class="font-weight-bold mb-1">{{getName($item["char"])}}</div>
                                {{mb_substr($item["mes"], 0, -1)}}
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection