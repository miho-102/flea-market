<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
</head>
<body>

    <h2>会員登録</h2>

    <form action="/register" method="POST">
        @csrf

        <div>
            <label>ユーザー名</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>確認用パスワード</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">
            登録する
        </button>

    </form>

    <a href="/login">ログインはこちら</a>

</body>
</html>