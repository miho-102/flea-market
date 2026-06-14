<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>

<form action="/" method="GET">
    <input type="text" name="keyword" value="{{ request('keyword') }}">
    <button type="submit">検索</button>
</form>

<a href="/?keyword={{ request('keyword') }}">おすすめ</a>
<a href="/?page=mylist&keyword={{ request('keyword') }}">マイリスト</a>

<h1>商品一覧</h1>

@foreach ($items as $item)
    <div>
        @if ($item->is_sold)
            <span>Sold</span>
        @endif

        <h3>
            <a href="/item/{{ $item->id }}">
                {{ $item->name }}
            </a>
        </h3>

        <p>{{ $item->price }}円</p>
    </div>
@endforeach


</body>
</html>