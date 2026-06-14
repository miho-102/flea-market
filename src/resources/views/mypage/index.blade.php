<h1>マイページ</h1>

<p>{{ $user->name }}</p>

<h2>出品した商品</h2>

@foreach ($items as $item)
    <p>{{ $item->name }}</p>
@endforeach