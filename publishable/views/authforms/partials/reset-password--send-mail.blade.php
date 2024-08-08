@section('title', __('authforms::forms.reset_password'))
<p class="title">@lang('authforms::forms.reset_password')</p>
<div class="form-group">
    <label for="email">@lang('authforms::forms.email')</label>
    <input type="email" id="email" name="email" placeholder="@lang('authforms::forms.email_placeholder')">
    <div data-error data-error-email></div>
    <div data-error data-error-common></div>
</div>
<button type="submit" class="btn">@lang('authforms::forms.reset_password_button')</button>

