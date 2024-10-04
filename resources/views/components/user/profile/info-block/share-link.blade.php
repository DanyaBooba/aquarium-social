@props([
    'link' => '',
])

<x-user.profile.info-block>
    <x-user.profile.info-block.icon.share-link />
    <span>
        {{ __('Поделитесь вашей ссылкой для регистрации.') }}
    </span>
    <a href="#" onClick="shareLink('{{ $link }}')">
        {{ __('Скопировать') }}
    </a>
</x-user.profile.info-block>
