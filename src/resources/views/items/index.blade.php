@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="tab">
    <a href="/?keyword={{ request('keyword') }}">おすすめ</a>
    <a href="/?page=mylist&keyword={{ request('keyword') }}">マイリスト</a>
</div>

<div class="item-list">
    @foreach ($items as $item)
        <div class="item-card">
            <a href="/item/{{ $item->id }}">
                <div class="item-card__image-wrap">

                    @if ($item->is_sold)
                        <span class="item-card__sold">Sold</span>
                    @endif

                    <img
                        src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->name }}"
                        class="item-card__image">

                </div>

                <p class="item-card__name">
                    {{ $item->name }}
                </p>
            </a>
        </div>
    @endforeach
</div>

@endsection