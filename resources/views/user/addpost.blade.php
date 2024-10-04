@extends('layouts.user.addpost')

@section('page.title', __('Добавить запись'))

@section('addpost.content')
    <div class="container-settings-main">
        <h1 class="mb-4">{{ __('Добавить запись') }}</h1>

        <x-form.error-first />

        <div class="addpost-container addpost-container-addpost">
            @if ($whiteList)
                <x-addpost.post-import />
            @else
                <x-addpost.post-moderate />
            @endif
            <form action="{{ route('post.add.store') }}" method="post">
                @csrf
                <input id="x" type="hidden" name="message">
                <trix-editor input="x" placeholder="{{ addpost_placeholder() }}"></trix-editor>
                <div>
                    <button type="submit" class="btn btn-success">
                        {{ __('Опубликовать') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
