@props([
    'profile' => (object) [],
])

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="canvasInfo" aria-labelledby="canvasInfoLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="canvasInfoLabel">
            {{ __('Информация о профиле') }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="user-offcanvas">
            <div class="user-profile-text">
                <p class="user-profile-name" title="{{ $profile->name }}">{{ $profile->name }}</p>
                @if ($profile->desc)
                    <p class="user-profile-desc" title="{{ $profile->desc }}">{{ $profile->desc }}</p>
                @endif
                @if ($profile->username)
                    <p class="user-profile-desc" title="{{ $profile->username }}">
                        <a href="{{ route_user_show($profile->id, $profile->username) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            {{ $profile->username }}
                        </a>
                    </p>
                @endif
                @if ($profile->create)
                    <p class="user-profile-desc" title="{{ $profile->create }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-calendar-plus">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <path d="M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8" />
                            <path d="M3 10h18" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg>
                        {{ $profile->create }}
                    </p>
                @endif
            </div>
            <div class="user-profile-data user-profile-data-mobile">
                <x-user.profile.profile.right-block :count="$profile->subs" modal="Subscribers" :text="use_form_word($profile->subs, __('подписчик'), __('подписчика'), __('подписчиков'))"
                    toastId="userNoSubs" />
                <x-user.profile.profile.right-block :count="$profile->sub" modal="Subscriptions" :text="use_form_word($profile->sub, __('подписка'), __('подписки'), __('подписок'))"
                    toastId="userNoSub" />
                <x-user.profile.profile.right-block :count="$profile->achivs" modal="Achievements" :text="use_form_word($profile->achivs, __('достижение'), __('достижения'), __('достижений'))"
                    toastId="userNoAchivs" />
            </div>
        </div>
    </div>
</div>
