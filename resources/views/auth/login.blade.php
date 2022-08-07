@extends('layouts.app_empty')
@section('page_title',trans('menu.auth.sign_in'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="{!! route('home') !!}" class="auth-logo">
                        <img src="{{ asset('images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                        <img src="{{ asset('images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <div class="p-3">
                <form class="form-horizontal mt-3" id="frmLogin">
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            {!! Form::text('username','',['class'=>'form-control', 'placeholder'=>trans('validation.attributes.user_name')]) !!}
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            {!! Form::password('password',['class'=>'form-control', 'placeholder'=>trans('validation.attributes.password')]) !!}
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="form-label ms-1"
                                       for="customCheck1">@lang('layout.labels.remember_me')</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light"
                                    type="submit">@lang('layout.buttons.sign_in')</button>
                        </div>
                    </div>

                    <div class="form-group mb-0 row mt-2">
                        <div class="col-sm-7 mt-3">
                            <a href="auth-recoverpw.html" class="text-muted"><i
                                    class="mdi mdi-lock"></i> @lang('layout.labels.forgot_password')?</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end -->
        </div>
        <!-- end cardbody -->
    </div>

@endsection
@section('scripts')
    <script>
        const loginConstants = {
            loginUrl: '{!! route('login') !!}'
        }
    </script>
    <script src="{{asset('js/pages/login/index.js')}}"></script>
@endsection

