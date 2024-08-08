<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <base href="/">

    <link rel="icon" type="image/ico" href="/manager/media/style/default/images/favicon.ico">
    <link rel="stylesheet" href="/assets/plugins/authforms/styles.css">

    <script type="text/javascript" defer src="{{ config('evocms-user.FrontJS', 'assets/plugins/evocms-user/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    @yield('content')

    @include('authforms.partials.footer-links')
</div>
</body>
</html>
