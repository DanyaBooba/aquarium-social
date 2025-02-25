@extends('layouts.user.settings')

@section('page.title', __('Сменить пароль'))

@section('settings.content')
    <x-settings.header route="{{ route('settings.profile') }}">
        {{ __('Сменить пароль') }}
    </x-settings.header>

    <x-form.error-first />

    <form action="{{ route('settings.profile.password.store') }}" onsubmit="sendForm('{{ route('settings') }}')"
        method="post">
        @csrf
        <x-form.input-password :labelShow="true" labelText="Текущий пароль" name="currentPassword" funcName="data" />
        <x-form.input-password :labelShow="true" labelText="Новый пароль" name="newPassword" funcName="data"
            id="password-form2" />

        <div class="visually-hidden">
            <button type="submit">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/auth/button-password.js') }}"></script>
@endpush
