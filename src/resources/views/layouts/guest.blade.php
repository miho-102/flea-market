<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>

<header class="guest-header">
    <img
        src="{{ asset('images/logo.svg') }}"
        alt="COACHTECH"
        class="guest-header__logo">
</header>

@yield('content')

</body>
</html>