@props([
    'comments' => [],
    'login' => false,
])

<h3 id="comments" class="mt-3">
    {{ __('Комментарии') }}
    <span class="text-muted">{{ count($comments) }}</span>
</h3>

<form action="">
    <input type="text">
</form>

@if (count($comments) > 0)
    > 0
@endif
