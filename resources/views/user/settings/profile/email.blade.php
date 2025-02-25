@extends('layouts.user.settings')

@section('page.title', __('Сменить почту'))

@section('settings.content')
    <x-settings.header route="{{ route('settings.profile') }}">
        {{ __('Сменить почту') }}
    </x-settings.header>

    <x-form.error-first />

    <form action="{{ route('settings.profile.email.store') }}" onsubmit="sendForm('{{ route('settings') }}')" method="post">
        @csrf
        <div>
            <label for="currentEmail" class="form-label">{{ __('Текущая почта') }}</label>
            <input type="email" name="currentEmail" class="form-control" id="currentEmail" placeholder="{{ __('Почта') }}"
                onInput="data()" required>
        </div>

        <x-form.input-password name="currentPassword" funcName="data" :labelShow="true" />

        <div>
            <label for="newEmail" class="form-label">{{ __('Новая почта') }}</label>
            <input type="email" name="newEmail" class="form-control" id="newEmail" placeholder="{{ __('Почта') }}"
                onInput="data()" required>
            <p>
                {{ __('После отправки формы, потребуется подтвердить почту по ссылке в письме.') }}
            </p>
        </div>

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
