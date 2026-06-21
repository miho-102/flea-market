@extends('layouts.app')

@section('title', '商品詳細')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<div class="item-detail">
    <div class="item-detail__image-area">
        @if ($item->image)
            <img
                src="{{ asset('storage/' . $item->image) }}"
                alt="{{ $item->name }}"
                class="item-detail__image">
        @endif
    </div>

    <div class="item-detail__content">
        <h1 class="item-detail__name">
            {{ $item->name }}
        </h1>

        <p class="item-detail__price">
            ¥{{ number_format($item->price) }}
        </p>

<div class="item-detail__icons">

    <div class="item-detail__icon">
        <form action="/item/{{ $item->id }}/like" method="POST">
            @csrf

            <button type="submit" class="icon-button">
                @if ($isLiked)
                <img src="{{ asset('images/ハートロゴ_ピンク.png') }}" alt="いいね済み" class="item-detail__icon-image">
                @else
                <img src="{{ asset('images/ハートロゴ_デフォルト.png') }}" alt="いいね" class="item-detail__icon-image">
                @endif
            </button>
        </form>

        <span>{{ $item->likes->count() }}</span>
    </div>

    <div class="item-detail__icon">
        <img
            src="{{ asset('images/ふきだしロゴ.png') }}"
            alt="コメント"
            class="item-detail__icon-image">

        <span>{{ $item->comments->count() }}</span>
    </div>

</div>

        <a href="/purchase/{{ $item->id }}" class="item-detail__purchase-button">
            購入する
        </a>

        <div class="item-detail__section">
            <h2>商品説明</h2>
            <p>{{ $item->description }}</p>
        </div>

        <div class="item-detail__section">
            <h2>商品の情報</h2>

            <p>
                <span class="item-detail__label">ブランド</span>
                {{ $item->brand_name ?? 'ブランドなし' }}
            </p>

            <p>
                <span class="item-detail__label">状態</span>
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

            <div class="item-detail__categories">
                <span class="item-detail__label">カテゴリー</span>

                <div class="item-detail__category-list">
                    @foreach ($item->categories as $category)
                        <span class="item-detail__category">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="item-detail__comments">
            <h2>コメント({{ $item->comments->count() }})</h2>

            @foreach ($item->comments as $comment)
                <div class="comment">
                    <p class="comment__user">
                        {{ $comment->user->name }}
                    </p>
                    <p class="comment__text">
                        {{ $comment->comment }}
                    </p>
                </div>
            @endforeach

            <form action="/item/{{ $item->id }}/comment" method="POST" class="comment-form">
                @csrf

                <label class="comment-form__label">
                    商品へのコメント
                </label>

                <textarea name="comment" class="comment-form__textarea">{{ old('comment') }}</textarea>

                @error('comment')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <button type="submit" class="comment-form__button">
                    コメントを送信する
                </button>
            </form>
        </div>

        <a href="/" class="item-detail__back-link">
            商品一覧へ戻る
        </a>
    </div>
</div>

@endsection
