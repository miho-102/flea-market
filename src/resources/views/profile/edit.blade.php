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
                @if ($profile->image)
                <img src="{{ asset('storage/' . $profile->image) }}" width="100">
                @endif
                <input type="file" name="image">
            </div>

            <div>
                <label>ユーザー名</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div>
                <label>郵便番号</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}">
            </div>

            <div>
                <label>住所</label>
                <input type="text" name="address" value="{{ old('address', $profile->address) }}">
            </div>

            <div>
                <label>建物名</label>
                <input type="text" name="building" value="{{ old('building', $profile->building) }}">
            </div>
            
            <button type="submit">
                更新する
            </button>
        </form>
    </body>
</html>