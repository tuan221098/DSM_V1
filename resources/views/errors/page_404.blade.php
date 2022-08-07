@extends('layouts.app_empty')
@section('page_title',trans('menu.errors.404'))
@section('content')
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <img src="{{ asset('media/illustrations/sketchy-1/18.png') }}" alt="" class="mw-100 mb-10 h-lg-450px" />
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">Không tìm thấy trang theo yêu cầu</h1>
        <a href="{!! route('home') !!}" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
@endsection
