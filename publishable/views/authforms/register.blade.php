@extends('authforms.layouts.authforms')

@section('title', __('authforms::forms.register'))

@section('content')
    <form data-evocms-user-action="register">
        <p class="title">@lang('authforms::forms.register')</p>
        @csrf
        <div class="form-group">
            <label for="email">@lang('authforms::forms.email')</label>
            <input type="email" id="email" name="email" placeholder="@lang('authforms::forms.email_placeholder')">
            <div data-error data-error-email></div>
        </div>
        <div class="form-group">
            <label for="fullname">@lang('authforms::forms.fullname')</label>
            <input type="text" id="fullname" name="fullname"
                   placeholder="@lang('authforms::forms.fullname_placeholder')">
            <div data-error data-error-fullname></div>
        </div>
        <div class="form-group">
            <label for="password">@lang('authforms::forms.password')</label>
            <input type="password" id="password" name="password"
                   placeholder="@lang('authforms::forms.password_placeholder')">
            <div data-error data-error-password></div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">@lang('authforms::forms.password_confirmation')</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="@lang('authforms::forms.password_confirmation_placeholder')">
            <div data-error data-error-password_confirmation></div>
            <div data-error data-error-common></div>
        </div>
        <button type="submit" class="btn">@lang('authforms::forms.register_button')</button>
    </form>

    @if(config('authforms.login.active') || config('authforms.reset_password.active'))
        <div class="links">
            @if(config('authforms.login.active'))
                <a href="{{ route(config('authforms.login.route')) }}">@lang('authforms::forms.login_menu')</a>
            @endif
            @if(config('authforms.reset_password.active'))
                <a href="{{ route(config('authforms.reset_password.route')) }}">@lang('authforms::forms.reset_password_menu')</a>
            @endif
        </div>
    @endif

    <script>
        $(document).ready(function () {
            $(document).on("evocms-user-register-success", function (e, actionUser, actionId, element, msg) {
                $('form[data-evocms-user-action="register"]').replaceWith(`
                <style> .container { text-align: center} </style>
                @if(config('authforms.SendVerificationEmailAfterRegistration'))
                @include('authforms.messages.register-user')
                @else
                @include('authforms.messages.register-verified-user')
                @endif
                `);
            })
        });
    </script>

@endsection
