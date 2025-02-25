@extends('layouts.user.user')

@section('page.title', __('Уведомления'))

@section('user.content')

    <h1>
        {{ __('Уведомления') }}
        <span class="text-muted">{{ $count }}</span>
    </h1>
    <div class="user-notifications">
        @if ($count == 0)
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                <img src="/img/illustrations/mail-2.png" alt="Уведомлений нет"
                    style="max-width: 150px; margin-top: 1rem; margin-bottom: .5rem;">
                <p>
                    {{ __('Уведомлений нет.') }}
                </p>
            </div>
        @else
            @foreach ($notifications as $item)
                <x-user.notifications.item :i="$loop->iteration" :header="$item->title" :text="$item->message" />
            @endforeach
            {{-- <ul class="list-group list-group-flush">
                <li class="list-group-item">Обнаружен вход в аккаунт. 2022 в 20:15</li>
                <li class="list-group-item">Обнаружен вход в аккаунт. 2022 в 20:15</li>
            </ul> --}}
        @endif

    </div>
@endsection
