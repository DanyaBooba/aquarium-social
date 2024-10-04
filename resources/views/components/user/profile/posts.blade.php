@props([
    'posts' => [],
    'empty' => '',
])

<div class="posts container">
    <x-post.show :posts="$posts" empty="{{ empty($empty) ? __('У пользователя нет постов.') : $empty }}" />
</div>
