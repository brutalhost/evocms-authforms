@extends('authforms.layouts.authforms')

@section('content')

    {{--Успешная валидация email--}}
    @if(request()->has('success'))
        <style>
            .container {
                text-align: center
            }
        </style>
        @include('authforms.messages.verification-completed')

        {{--Форма восстановления пароля--}}
    @else
        <form data-evocms-user-action="reset-password">
            @csrf

            {{--Если есть хэш - пользователь открыл ссылку для изменения пароля--}}
            @if(request()->has('hash'))
                @include('authforms.partials.reset-password--change-password')
            @else
                @include('authforms.partials.reset-password--send-mail')
            @endif

            @if(config('authforms.login.active') || config('authforms.reset_password.active'))
                <div class="links">
                    @if(config('authforms.login.active'))
                        <a href="{{ route(config('authforms.login.route')) }}">@lang('authforms::forms.login_menu')</a>
                    @endif
                    @if(config('authforms.register.active'))
                        <a href="{{ route(config('authforms.register.route')) }}">@lang('authforms::forms.register_menu')</a>
                    @endif
                </div>
            @endif
        </form>
    @endif

    <script>
        $(document).ready(function () {
            $(document).on("evocms-user-reset-password-success", function (e, actionUser, actionId, element, msg) {
                $('form[data-evocms-user-action="reset-password"]').replaceWith(`
                <style> .container { text-align: center} </style>
                @if(request()->has('hash'))
                @include('authforms.messages.change-password-completed')
                @else
                @include('authforms.messages.sended-mail-for-change-password')
                @endif
                `);
            })
        });
    </script>

@endsection
