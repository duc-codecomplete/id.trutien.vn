@extends('layouts.master')
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
        <h1 class="h3 d-inline align-middle">Trò chuyện kênh thế giới</h1><a class="badge bg-primary ms-2" href="https://trutien.vn/tai-game"
            target="_blank">Tham gia game ngay <i class="fas fa-fw fa-external-link-alt"></i></a>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="flex-grow-1 ps-3">
                            <strong>Mọi người đang nói gì với nhau</strong>
                        </div>
                        <a href="/chat">
                            <button class="btn btn-secondary btn-lg me-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                              </svg>Refresh</button>
                        </a>
                    </div>
                </div>
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
                                {{$item["mes"]}}
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