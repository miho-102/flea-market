<h1>購入画面</h1>

<p>{{ $item->name }}</p>
<p>{{ $item->price }}円</p>

<form action="/purchase/{{ $item->id }}" method="POST">
    @csrf

    <button type="submit">
        購入確定
    </button>
</form>