@extends('layouts.auth.signup')

@section('page.title', __('Регистрация'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('auth.signup') }}">
        {{ __('Регистрация') }}
    </x-sign.header>
@endsection

@section('auth.signup')
    <div id="signin-email">

        <x-form.error-first />

        <form action={{ route('auth.signup.email.store') }} method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                    onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
                <label for="email">{{ __('Почта') }}</label>
            </div>
            <x-form.input-password />

            <div class="form-check text-start mb-3 mt-2">
                <input class="form-check-input" name="agreement" type="checkbox" value="privacy" id="check"
                    onInput="checkOnInput()">
                <label class="form-check-label small" for="check">
                    {{ __('Подтверждаете') }}
                    <a href="{{ route('main.terms.privacy') }}">
                        {{ __('политику конфиденциальности') }}
                    </a>
                </label>
            </div>

            <button class="btn btn-success py-3" type="submit">{{ __('Регистрация') }}</button>
        </form>
    </div>
@endsection
