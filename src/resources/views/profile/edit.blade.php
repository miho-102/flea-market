@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<div class="profile-edit">
    <h1 class="profile-edit__title">プロフィール設定</h1>

    <form action="/mypage/profile" method="POST" enctype="multipart/form-data" class="profile-form">
        @csrf

        <div class="profile-form__image-area">
            @if ($profile && $profile->image)
                <img
                    src="{{ asset('storage/' . $profile->image) }}"
                    alt="プロフィール画像"
                    class="profile-form__image">
            @else
                <div class="profile-form__image-placeholder"></div>
            @endif

            <label class="profile-form__image-button">
                画像を選択する
                <input type="file" name="image">
            </label>

            @error('image')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-form__group">
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}">

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-form__group">
            <label>郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? '') }}">

            @error('postal_code')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-form__group">
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}">

            @error('address')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-form__group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', $profile->building ?? '') }}">
        </div>

        <button type="submit" class="profile-form__button">
            更新する
        </button>
    </form>
</div>

@endsection