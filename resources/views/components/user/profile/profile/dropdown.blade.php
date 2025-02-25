@props([
    'profile' => (object) [],
    'issub' => false,
    'itsme' => false,
])

@if ($itsme)
    <button class="btn btn-secondary user-button-mobile" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        disabled>
        <x-user.profile.profile.icon.more />
        {{ __('Ещё') }}
    </button>
@else
    <div class="dropdown user-button-mobile">
        <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <x-user.profile.profile.icon.more />
            {{ __('Ещё') }}
        </button>
        <ul class="dropdown-menu">
            <li class="user-dropdown-from-the-side">
                <a class="dropdown-item" href="{{ route('user.complain', $profile->id) }}">
                    {{ __('Пожаловаться') }}
                    <x-user.profile.profile.icon.complain />
                </a>
            </li>
            <li class="user-dropdown-share">
                <a class="dropdown-item" href="#" data-bs-toggle=modal data-bs-target=#qrCodeModal>
                    {{ __('Поделиться') }}
                    <x-user.profile.profile.icon.share />
                </a>
            </li>
            <li class="user-dropdown-sub">
                <a class="dropdown-item" href="{{ route('user.sub', $profile->id) }}">
                    @if ($issub)
                        {{ __('Подписан') }}
                        <x-user.profile.profile.icon.sub-true />
                    @else
                        {{ __('Подписаться') }}
                        <x-user.profile.profile.icon.sub-false />
                    @endif
                </a>
            </li>
        </ul>
    </div>
@endif
