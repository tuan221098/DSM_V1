@extends('layouts.app_empty')
@section('content')
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="{!! route('home') !!}" class="mb-12">
                <img alt="Logo" src="{{asset('media/logos/logo-1.svg')}}" class="h-40px" />
            </a>
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" novalidate="novalidate" id="frmLogin" action="{!! route('login') !!}"  >
                    {!!  csrf_field() !!}
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">@lang('layout.labels.hi_sign_in')</h1>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">@lang('validation.attributes.user_name')</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">@lang('validation.attributes.password')</label>
                            <a href="" class="link-primary fs-6 fw-bolder">@lang('layout.label1.forgot_password')</a>
                        </div>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">@lang('layout.buttons.sign_in')</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        const loginConstants={
            loginUrl: '{!! route('login') !!}'
        }
    </script>
    <script src="{{asset('js/pages/login/index.js')}}"></script>
@endsection

