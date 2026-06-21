@extends('layouts.guest')

@section('title', 'メール認証')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth">
    <h1 class="auth__title">
        メール認証
    </h1>

    <p class="auth__text">
        登録していただいたメールアドレスに認証メールを送付しました。<br>
        メール認証を完了してください。
    </p>

    <form method="POST" action="{{ route('verification.send') }}" class="auth-form">
        @csrf

        <button type="submit" class="auth-form__button">
            認証メールを再送する
        </button>
    </form>

    <div class="auth__link">
        <a href="/">
            トップページへ戻る
        </a>
    </div>
</div>

@endsection