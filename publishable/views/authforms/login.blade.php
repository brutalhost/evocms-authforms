@extends('authforms.layouts.authforms')

@section('title', __('authforms::forms.login'))

@section('content')
    <form data-evocms-user-action="auth">
        <p class="title">@lang('authforms::forms.login')</p>
        @csrf
        <div class="form-group">
            <label for="username">@lang('authforms::forms.username')</label>
            <input type="text" id="username" name="username" placeholder="@lang('authforms::forms.username_placeholder')">
            <div data-error data-error-username></div>
        </div>
        <div class="form-group">
            <label for="password">@lang('authforms::forms.password')</label>
            <input type="password" id="password" name="password" placeholder="@lang('authforms::forms.password_placeholder')">
            <div data-error data-error-password></div>
            <div data-error data-error-common></div>
        </div>
        <button type="submit" class="btn">@lang('authforms::forms.login_button')</button>
    </form>

    @if(config('authforms.register.active') || config('authforms.reset_password.active'))
        <div class="links">
            @if(config('authforms.register.active'))
                <a href="{{ route(config('authforms.register.route')) }}">@lang('authforms::forms.register_menu')</a>
            @endif
            @if(config('authforms.reset_password.active'))
                <a href="{{ route(config('authforms.reset_password.route')) }}">@lang('authforms::forms.reset_password_menu')</a>
            @endif
        </div>
    @endif
@endsection
