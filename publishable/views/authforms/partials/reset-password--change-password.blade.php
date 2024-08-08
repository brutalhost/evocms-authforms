@section('title', __('authforms::forms.change_password_title'))
<p class="title">@lang('authforms::forms.change_password_title')</p>
<input type="hidden" name="hash" value="{{ request()->get('hash') }}">

<div class="form-group">
    <label for="password">@lang('authforms::forms.password')</label>
    <input type="password" id="password" name="password" placeholder="@lang('authforms::forms.password_placeholder')">
    <div data-error data-error-password></div>
</div>
<div class="form-group">
    <label for="password_confirmation">@lang('authforms::forms.password_confirmation')</label>
    <input type="password" id="password_confirmation" name="password_confirmation"
           placeholder="@lang('authforms::forms.password_confirmation_placeholder')">
    <div data-error data-error-password_confirmation></div>
    <div data-error data-error-password_confirmation></div>
    <div data-error data-error-common></div>
</div>
<button type="submit" class="btn">@lang('authforms::forms.change_password_button')</button>

