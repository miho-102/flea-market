<h1>住所の変更</h1>

<form action="/purchase/address/{{ $item->id }}" method="POST">
    @csrf

    <p>郵便番号</p>
    <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? '') }}">

    @error('postal_code')
    <p>{{ $message }}</p>
    @enderror

    <p>住所</p>
    <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}">
    @error('address')
    <p>{{ $message }}</p>
    @enderror

    <p>建物名</p>
    <input type="text" name="building" value="{{ old('building', $profile->building ?? '') }}">

    <button type="submit">
        更新する
    </button>
</form>