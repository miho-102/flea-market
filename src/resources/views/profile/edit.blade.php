<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>プロフィール設定</title>
    </head>
    <body>
        <h1>プロフィール設定</h1>
        
        <form action="/mypage/profile" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div>
                <label>プロフィール画像</label>
                <input type="file" name="image">
            </div>

            <div>
                <label>ユーザー名</label>
                <input type="text" name="name">
            </div>

            <div>
                <label>郵便番号</label>
                <input type="text" name="postal_code">
            </div>

            <div>
                <label>住所</label>
                <input type="text" name="address">
            </div>

            <div>
                <label>建物名</label>
                <input type="text" name="building">
            </div>
            
            <button type="submit">
                更新する
            </button>
        </form>
    </body>
</html>