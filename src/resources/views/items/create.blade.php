@extends('layouts.app')

@section('title', '商品出品')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')

<div class="sell">
    <h1 class="sell__title">商品の出品</h1>

    <form action="/sell" method="POST" enctype="multipart/form-data" class="sell-form">
        @csrf

        <div class="sell-form__group">
            <label class="sell-form__label">商品画像</label>

            <img id="image-preview" class="image-preview" style="display:none;">

            <label class="image-upload">
                <input type="file" name="image">
                <span>画像を選択する</span>
            </label>

            @error('image')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="sell-form__section-title">
            商品の詳細
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">カテゴリー</label>

            <div class="category-list">
                @foreach ($categories as $category)
                    <label class="category-item">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        <span>{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>

            @error('categories')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">商品の状態</label>

            <select name="condition" class="sell-form__select">
                <option value="">選択してください</option>
                <option value="1">良好</option>
                <option value="2">目立った傷や汚れなし</option>
                <option value="3">やや傷や汚れあり</option>
                <option value="4">状態が悪い</option>
            </select>

            @error('condition')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="sell-form__section-title">
            商品名と説明
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">商品名</label>
            <input type="text" name="name" value="{{ old('name') }}" class="sell-form__input">

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">ブランド名</label>
            <input type="text" name="brand_name" value="{{ old('brand_name') }}" class="sell-form__input">
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">商品の説明</label>
            <textarea name="description" class="sell-form__textarea">{{ old('description') }}</textarea>

            @error('description')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="sell-form__group">
            <label class="sell-form__label">販売価格</label>
            <div class="price-input">
                <span>¥</span>
                <input type="text" name="price" value="{{ old('price') }}">
            </div>

            @error('price')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="sell-form__button">
            出品する
        </button>
    </form>
</div>

<script>
document.getElementById('image-input').addEventListener('change', function()
{
    const file = this.files[0];

    if (file) {
        const preview = document.getElementById('image-preview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
});
</script>

@endsection