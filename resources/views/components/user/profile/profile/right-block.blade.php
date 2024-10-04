@props([
    'count' => 0,
    'text' => '',
    'modal' => '',
    'toastId' => '',
])

@props([
    '_attr' =>
        $count > 0 ? 'data-bs-toggle=modal data-bs-target=#modal' . $modal : 'onclick=showToastId("' . $toastId . '")',
])

<div title="{{ number_format($count) }} {{ $text }}">
    <button type="button" {{ $_attr }}>
        <p>{{ profile_text_info($count) }}</p>
        <p>{{ $text }}</p>
    </button>
</div>
