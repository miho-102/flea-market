<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>

<header class="header">
    <div class="header__logo">
        <img
        src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}"
        alt="COACHTECH"
        class="header__logo-image">
    </div>

    <form action="/" method="GET" class="header__search">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="なにをお探しですか？">
    </form>

    <nav class="header__nav">
        <form action="/logout" method="POST" class="header__logout-form">
            @csrf
            <button type="submit" class="header__logout-button">
                ログアウト
            </button>
        </form>
        <a href="/mypage">マイページ</a>
        <a href="/sell" class="header__sell">出品</a>
    </nav>
</header>

@yield('content')

</body>
</html>