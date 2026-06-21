@extends('layouts.app')

@section('title', '購入画面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class="purchase">
    <div class="purchase__main">
        <div class="purchase__item">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="purchase__image">

            <div>
                <h2 class="purchase__item-name">{{ $item->name }}</h2>
                <p class="purchase__price">¥{{ number_format($item->price) }}</p>
            </div>
        </div>

        <div class="purchase__section">
            <h3>支払い方法</h3>

            <select name="payment_method" form="purchase-form" class="purchase__select">
                <option value="">選択してください</option>
                <option value="コンビニ払い">コンビニ払い</option>
                <option value="カード支払い">カード支払い</option>
            </select>

            @error('payment_method')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="purchase__section">
            <div class="purchase__address-title">
                <h3>配送先</h3>
                <a href="/purchase/address/{{ $item->id }}">変更する</a>
            </div>

            <p>〒{{ $profile->postal_code }}</p>
            <p>{{ $profile->address }}</p>
            <p>{{ $profile->building }}</p>
        </div>
    </div>

    <form action="/purchase/{{ $item->id }}" method="POST" id="purchase-form" class="purchase__side">
        @csrf

        <div class="purchase__summary">
            <div class="purchase__summary-row">
                <span>商品代金</span>
                <span>¥{{ number_format($item->price) }}</span>
            </div>

            <div class="purchase__summary-row">
                <span>支払い方法</span>
                <span>選択後に反映</span>
            </div>
        </div>

        <button type="submit" class="purchase__button">
            購入する
        </button>
    </form>
</div>

@endsection