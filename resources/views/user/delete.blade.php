@extends('layouts.auth.signin')

@section('page.title', __('Удалить аккаунт'))

@section('auth.header')
    <x-sign.header routeClose="{{ route('user') }}" class='text-danger'>
        {{ __('Удалить аккаунт') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    @if ($useService)
        <form action={{ route('user.delete.service.store') }} method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="confirmDelete" class="form-control" id="confirmDelete"
                    placeholder="Подтвердите удаление аккаунта" onInput="checkOnInput()" value="{{ old('confirmDelete') }}"
                    required>
                <label for="confirmDelete">{{ __('Подтвердите удаление') }}</label>
                <p style="color: var(--text-muted); font-size: .875rem; margin-bottom: 0; user-select: none;">
                    Введите: <span style="color: var(--text) !important">Подтверждаю удаление аккаунта</span>
                </p>
            </div>

            <button class="btn btn-danger py-3 mt-3" type="submit">{{ __('Удалить') }}</button>
        </form>
    @else
        <form action={{ route('user.delete.store') }} method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                    onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
                <label for="email">{{ __('Почта') }}</label>
            </div>

            <x-form.input-password />

            <div class="form-floating">
                <input type="text" name="confirmDelete" class="form-control" id="confirmDelete"
                    placeholder="Подтвердите удаление аккаунта" onInput="checkOnInput()" value="{{ old('confirmDelete') }}"
                    required>
                <label for="confirmDelete">{{ __('Подтвердите удаление') }}</label>
                <p style="color: var(--text-muted); font-size: .875rem; margin-bottom: 0; user-select: none;">
                    Введите: <span style="color: var(--text) !important">Подтверждаю удаление аккаунта</span>
                </p>
            </div>

            <button class="btn btn-danger py-3 mt-3" type="submit">{{ __('Удалить') }}</button>
        </form>
    @endif

@endsection
