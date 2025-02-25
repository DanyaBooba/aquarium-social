@extends('layouts.auth.sign')

@section('page.title', __('Вход'))

@section('auth.header')
    <x-sign.header :routeLogin="true">
        {{ __('Вход') }}
    </x-sign.header>
@endsection

@section('auth.sign')
    <div class="row row-cols-2 flex-wrap gx-2 mb-0">
        <div id="signin-choose-yandex" style="flex: 1">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ $yandexUri }}')">
                <x-sign.logo.yandex />
            </button>
        </div>
        <div id="signin-choose-google" style="max-width: 100px">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ $vkUri }}')" style="height: 100%">
                <x-sign.logo.vk />
            </button>
        </div>
        <div class="d-none">Google: {{ $googleUri }}</div>
        <div class="d-none">GitHub: {{ $githubUri }}</div>
    </div>
    <x-sign.choose-or />
    <div id="signin-choose-email">
        <a href="{{ route('auth.code') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </svg>
            {{ __('Почта') }}
        </a>
    </div>
    <div>
        <a href="{{ route('auth.sign.test') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                <path d="M8 11h8" />
                <path d="M8 7h6" />
            </svg>
            {{ __('Тестовый аккаунт') }}
        </a>
    </div>
@endsection
