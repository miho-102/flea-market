@extends('layouts.app')

@section('title', 'マイページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">
    <div class="mypage-profile">
        @if ($profile && $profile->image)
            <img src="{{ asset('storage/' . $profile->image) }}" class="mypage-profile__image">
        @endif

        <h1 class="mypage-profile__name">
            {{ $user->name }}
        </h1>

        <a href="/mypage/profile" class="mypage-profile__button">
            プロフィールを編集
        </a>
    </div>

    <div class="mypage-tab">
        <a href="/mypage?page=sell" class="{{ request('page') !== 'buy' ? 'active' : '' }}">
            出品した商品
        </a>

        <a href="/mypage?page=buy" class="{{ request('page') === 'buy' ? 'active' : '' }}">
            購入した商品
        </a>
    </div>

    <div class="mypage-items">
        @if (request('page') === 'buy')
            @foreach ($purchases as $purchase)
                <div class="mypage-item">
                    <a href="/item/{{ $purchase->item->id }}">
                        <img src="{{ asset('storage/' . $purchase->item->image) }}" class="mypage-item__image">
                        <p>{{ $purchase->item->name }}</p>
                    </a>
                </div>
            @endforeach
        @else
            @foreach ($items as $item)
                <div class="mypage-item">
                    <a href="/item/{{ $item->id }}">
                        <img src="{{ asset('storage/' . $item->image) }}" class="mypage-item__image">
                        <p>{{ $item->name }}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection