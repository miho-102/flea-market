@extends('layouts.guest')

@section('title', '会員登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth">
    <h1 class="auth__title">
        会員登録
    </h1>

    <form action="{{ route('register') }}" method="POST" class="auth-form">
        @csrf

        <div class="auth-form__group">
            <label>ユーザー名</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}">

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-form__group">
            <label>メールアドレス</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}">

            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-form__group">
            <label>パスワード</label>

            <input
                type="password"
                name="password">

            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-form__group">
            <label>確認用パスワード</label>

            <input
                type="password"
                name="password_confirmation">

            @error('password_confirmation')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="auth-form__button">
            登録する
        </button>
    </form>

    <div class="auth__link">
        <a href="/login">
            ログインはこちら
        </a>
    </div>
</div>

@endsection