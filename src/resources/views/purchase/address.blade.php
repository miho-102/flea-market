@extends('layouts.app')

@section('title', '住所の変更')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')

<div class="address-edit">
    <h1 class="address-edit__title">
        住所の変更
    </h1>

    <form action="/purchase/address/{{ $item->id }}" method="POST" class="address-form">
        @csrf

        <div class="address-form__group">
            <label>郵便番号</label>
            <input
                type="text"
                name="postal_code"
                value="{{ old('postal_code', $profile->postal_code ?? '') }}">
            @error('postal_code')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="address-form__group">
            <label>住所</label>
            <input
                type="text"
                name="address"
                value="{{ old('address', $profile->address ?? '') }}">
            @error('address')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="address-form__group">
            <label>建物名</label>
            <input
                type="text"
                name="building"
                value="{{ old('building', $profile->building ?? '') }}">
        </div>

        <button type="submit" class="address-form__button">
            更新する
        </button>
    </form>
</div>

@endsection