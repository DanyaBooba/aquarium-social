@props([
    'text' => '',
    'id' => '',
])

<div class="toast-container">
    <div class="toast" id={{ $id }} role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            {{ $text }}
        </div>
    </div>
</div>
