<h1>商品出品</h1>

<form action="/sell" method="POST" enctype="multipart/form-data">
    @csrf

    <p>カテゴリー</p>

    @foreach ($categories as $category)
        <label>
            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            {{ $category->name }}
        </label>
    @endforeach

    <p>商品の状態</p>
    <select name="condition">
        <option value="">選択してください</option>
        <option value="1">良好</option>
        <option value="2">目立った傷や汚れなし</option>
        <option value="3">やや傷や汚れあり</option>
        <option value="4">状態が悪い</option>
</select>

    <p>商品名</p>
    <input type="text" name="name">

    <p>ブランド名</p>
    <input type="text" name="brand_name">

    <p>商品の説明</p>
    <textarea name="description"></textarea>

    <p>販売価格</p>
    <input type="text" name="price">

    <p>商品画像</p>
    <input type="file" name="image">

    <button type="submit">
        出品する
    </button>

</form>