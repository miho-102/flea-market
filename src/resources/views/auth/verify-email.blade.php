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

    <a href="http://localhost:8025"
    target="_blank"
    class="verify-email__button">
    認証はこちらから
</a>

    <div class="auth__link">
        <a href="/">
            認証メールを再送する
        </a>
    </div>
</div>

@endsection