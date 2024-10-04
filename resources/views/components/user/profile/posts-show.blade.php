@props([
    'local' => true,
    'posts' => [],
    'privatePosts' => [],
    'nullPosts' => [],
    'count' => 0,
])

@if ($count > 0)
    @if ($local)
        @if (count($posts) > 0)
            <h2>{{ __('Ваши записи') }}</h2>
            <x-user.profile.posts :posts="$posts" />
        @endif

        @if (count($privatePosts) > 0)
            <h2>{{ __('Записи, ожидающие модерацию') }}</h2>
            <x-user.profile.posts :posts="$privatePosts" empty="{{ __('Нет записей.') }}" />
        @endif

        @if (count($nullPosts) > 0)
            <h2>{{ __('Отклоненные записи') }}</h2>
            <x-user.profile.posts :posts="$nullPosts" empty="{{ __('Нет записей.') }}" />
        @endif
    @else
        <h2>{{ __('Записи пользователя') }}</h2>
        <x-user.profile.posts :posts="$posts" />
    @endif
@else
    <h4 class="text-center fs-3" style="margin-top: 2rem; margin-bottom: 5rem">
        Записей не найдено.
    </h4>
@endif
