@extends('layouts.auth.signin')

@section('page.title', __('Ввести новый пароль'))

@section('auth.header')
    <x-sign.header>
        {{ __('Ввести новый пароль') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.restore.enter.store', $code) }} method="post">
        @csrf
        <x-form.input-password />

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Восстановить') }}</button>
    </form>

    <a href="{{ route('auth.signin.email') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-log-in">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
            <polyline points="10 17 15 12 10 7" />
            <line x1="15" x2="3" y1="12" y2="12" />
        </svg>
        {{ __('Вернуться ко входу?') }}
    </a>
@endsection
