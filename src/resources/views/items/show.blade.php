<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品詳細</title>
</head>
<body>

<h1>商品詳細</h1>

@if ($item->image)
    <img src="{{ asset('storage/' . $item->image) }}" width="300">
@endif

<h2>{{ $item->name }}</h2>

<p>{{ $item->price }}円</p>

<p>{{ $item->description }}</p>

<p>
    ブランド：
    {{ $item->brand_name ?? 'ブランドなし' }}
</p>

<p>
    状態：
    @if ($item->condition == 1)
        良好
    @elseif ($item->condition == 2)
        目立った傷や汚れなし
    @elseif ($item->condition == 3)
        やや傷や汚れあり
    @elseif ($item->condition == 4)
        状態が悪い
    @endif
</p>

<p>カテゴリ：</p>

@foreach ($item->categories as $category)
    <p>{{ $category->name }}</p>
@endforeach

<p>
    商品説明：
    {{ $item->description }}
</p>

<h2>コメント</h2>

@foreach ($item->comments as $comment)
    <div>
        <p>{{ $comment->user->name }}</p>
        <p>{{ $comment->comment }}</p>
    </div>
@endforeach

<form action="/item/{{ $item->id }}/comments" method="POST">
    @csrf

    <textarea name="comment"></textarea>
    @error('comment')
    <p>{{ $message }}</p>
    @enderror

    <button type="submit">
        コメントを送信する
    </button>

<a href="/">
    商品一覧へ戻る
</a>

</body>
</html>

