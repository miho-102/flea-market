<h1>住所の変更</h1>

<form action="/purchase/address/{{ $item->id }}" method="POST">
    @csrf

    <p>郵便番号</p>
    <input type="text" name="postal_code" value="{{ $profile->postal_code ?? '' }}">

    <p>住所</p>
    <input type="text" name="address" value="{{ $profile->address ?? '' }}">

    <p>建物名</p>
    <input type="text" name="building" value="{{ $profile->building ?? '' }}">

    <button type="submit">
        更新する
    </button>
</form>