@extends('layouts.user.user')

@section('page.title', __('Лента'))

@push('css')
    <link rel="stylesheet" href="{{ asset('css/feed/include.css') }}">
@endpush

@section('user.content')
    <div class="posts mt-0 container">
        <div class="feed-title">
            <h1 class="visually-hidden">{{ __('Записи пользователей') }}</h1>

            {{-- <button type="button" onClick="feedActive('all')" class="btn h2" id="feedAll">
                {{ __('Все записи') }}
            </button>
            <button type="button" onClick="feedActive('subs')" class="btn h2" id="feedSubs">
                {{ __('Подписки') }}
            </button> --}}
        </div>
        <x-post.show :posts="$posts" :showUser="true" />
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/user/feed/title.js') }}"></script>
@endpush
