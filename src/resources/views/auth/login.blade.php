@extends('layouts.guest')

@section('title', 'ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth">
    <h1 class="auth__title">
        ログイン
    </h1>

    <form action="{{ route('login') }}" method="POST" class="auth-form">
        @csrf

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

        <button type="submit" class="auth-form__button">
            ログインする
        </button>
    </form>

    <div class="auth__link">
        <a href="/register">
            会員登録はこちら
        </a>
    </div>
</div>

@endsection