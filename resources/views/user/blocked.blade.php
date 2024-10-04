@extends('layouts.auth.sign')

@section('page.title', __('Вход'))

@section('auth.header')
    <x-sign.logo.logo />
    <h1 class="h3">
        Аккаунт заблокирован
    </h1>
@endsection

@section('auth.sign')
    @if ($forever)
        <p>
            Вами были нарушены <a href="{{ route('main.terms') }}">правила</a> платформы Аквариум, в связи с чем ваш
            аккаунт был заблокирован навсегда. Мы направили всю необходимую информацию на вашу почту.
        </p>
    @else
        <p>
            Вами были нарушены <a href="{{ route('main.terms') }}">правила</a> платформы Аквариум, в связи с чем ваш аккаунт
            был заблокирован.
        </p>
        <p>
            Получить доступ к аккаунту можно будет {{ $datetime }}.
        </p>
    @endif
    <a href="{{ route('user.exit.exactly') }}" class="simple">
        {{ __('Выйти из аккаунта?') }}
    </a>
@endsection
