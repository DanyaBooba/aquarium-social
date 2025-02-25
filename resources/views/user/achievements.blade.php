@extends('layouts.user.user')

@section('page.title', __('Достижения'))

@section('user.content')

    <h1>{{ __('Достижения') }} <span class="text-muted">{{ $count }}</span></h1>
    @if ($count == 0)
        <div class="user-notifications">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                <img src="/img/illustrations/achivs.png" alt="Уведомлений нет"
                    style="max-width: 150px; margin-top: 1rem; margin-bottom: .5rem;">
                <p style="max-width: 300px; text-align: center;">
                    {{ __('Участвуйте в жизни социальной сети и получайте за это достижения!') }}
                </p>
            </div>
        </div>
    @else
        <div class="list-achievements row row-cols-md-3">
            @foreach ($achievements as $item)
                <div class="col">
                    <span>
                        <img src="{{ asset('/img/user/achivs/achiv-' . $item->id . '.jpg') }}" alt="{{ __($item->name) }}">
                    </span>
                    <x-circle-text.circle-text-simple>
                        {{ __($item->name) }}
                    </x-circle-text.circle-text-simple>
                </div>
            @endforeach
        </div>
    @endif

@endsection
