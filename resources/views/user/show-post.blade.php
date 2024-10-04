@extends('layouts.user.settings')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts/include.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}" />
    <script src="{{ asset('js/fancybox.js') }}"></script>
@endpush

@section('page.title', __('Пост'))

@section('user.alert')
    @if ($alert = session()->pull('alert.error'))
        <x-user.alert.alert :close=false>
            {{ $alert }}
        </x-user.alert.alert>
    @endif

    @if ($active == 0)
        <x-user.alert.alert :close=false>
            {{ __('Запись находится на модерации') }}
        </x-user.alert.alert>
    @elseif($active == -1)
        <x-user.alert.alert :close=false>
            <div class="text-danger">
                {{ __('Запись не одобрена к публикации') }}
            </div>
        </x-user.alert.alert>
    @endif
@endsection

@section('settings.content')
    <div class="container-post">
        <div class="container-post__main">
            <x-post.show.header :userId="$user->id" :avatar="$user->avatar" :avatarDefault="$user->avatarDefault" :name="profile_display_name($user->firstName, $user->lastName)" :postId="$post->idPost"
                :mypost="$itsmypost" />
            @if ($post->haveimage)
                <a data-fancybox="" data-src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}">
                    <span class="post-image">
                        <img src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}"
                            alt="{{ $post->desc }}">
                    </span>
                </a>
            @endif
            <div id="postMain">
                {!! $post->message !!}
            </div>

            <div class="modal fade" id="modalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header mb-0 pb-0">
                            <h1 class="modal-title fs-5 mt-0" id="exampleModalLabel">{{ __('Перейти по ссылке?') }}</h1>
                        </div>
                        <div class="modal-body">
                            <div>
                                {{ __('Вы пытаетесь открыть ссылку:') }}
                            </div>
                            <div id="modalLink_data">

                            </div>
                            <div class="mt-3 d-flex" style="gap: .5rem">
                                <button type="button" id="modalLinkButtonOpen" class="btn btn-primary"
                                    style="flex: 1">{{ __('Открыть ссылку') }}</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('Отмена') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-post.show.bottom :like="false" :idPost="$post->idPost" :idUser="$user->id" />
        <x-post.show.comments :comments="$comments" />
    </div>
@endsection

@push('js')
    <script src={{ asset('js/user/post/show.js') }}></script>
@endpush
