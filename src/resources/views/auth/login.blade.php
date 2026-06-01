<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>

    <h2>ログイン</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label>メールアドレス</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
            >
        </div>

        <div>
            <label>パスワード</label>
            <input
                type="password"
                name="password"
            >
        </div>

        <button type="submit">
            ログインする
        </button>

    </form>

    <a href="/register">
        会員登録はこちら
    </a>

</body>
</html>