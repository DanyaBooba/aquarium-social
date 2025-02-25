@props([
    'profile' => (object) [],
])

<div class="dropdown user-button-mobile">
    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <x-user.profile.profile.icon.more />
        {{ __('Ещё') }}
    </button>
    <ul class="dropdown-menu">
        <li class="user-dropdown-from-the-side">
            <a class="dropdown-item" href="{{ route_user_show($profile->id, $profile->username) }}">
                {{ __('Профиль со стороны') }}
                <x-user.profile.profile.icon.from-the-side />
            </a>
        </li>
        <li class="user-dropdown-share">
            <a class="dropdown-item" href="#" data-bs-toggle=modal data-bs-target=#qrCodeModal>
                {{ __('Поделиться') }}
                <x-user.profile.profile.icon.share />
            </a>
        </li>
        <li class="user-dropdown-settings">
            <a class="dropdown-item" href="{{ route('settings') }}">
                {{ __('Настройки') }}
                <x-user.profile.profile.icon.settings />
            </a>
        </li>
    </ul>
</div>
