@extends('layouts.auth.signin')

@section('page.title', __('Добавить аккаунт'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('second.auth.signin') }}" routeClose="{{ route('user') }}">
        {{ __('Добавить аккаунт') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('second.auth.signin.email.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <x-form.input-password />

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Войти') }}</button>
    </form>

    <a href="{{ route('second.auth.help') }}"
        class="d-flex justify-content-center align-items-center mt-4 mb-5 text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-1" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-message-circle-question">
            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
            <path d="M12 17h.01" />
        </svg>
        {{ __('Проблемы со входом?') }}
    </a>
@endsection
