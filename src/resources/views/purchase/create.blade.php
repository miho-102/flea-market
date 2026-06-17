<h1>購入画面</h1>

<p>{{ $item->name }}</p>
<p>{{ $item->price }}円</p>

<form action="/purchase/{{ $item->id }}" method="POST">
    @csrf

<p>支払い方法</p>
    <select name="payment_method">
        <option value="">選択してください</option>
        <option value="コンビニ払い">コンビニ払い</option>
        <option value="カード支払い">カード支払い</option>
    </select>

    <p>配送先</p>

    <a href="/purchase/address/{{ $item->id }}">
    変更する
    </a>

    <p>〒{{ $profile->postal_code }}</p>
    <p>{{ $profile->address }}</p>
    <p>{{ $profile->building }}</p>

    <button type="submit">
        購入する
    </button>
</form>