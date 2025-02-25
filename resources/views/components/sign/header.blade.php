@props([
    'routeBack' => '',
    'routeLogin' => false,
    'routeReg' => false,
    'routeClose' => '',
    'class' => '',
])

<div class="authentication-back">
    @if ($routeBack)
        <a href="{{ $routeBack }}" class="authentication-back-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6" />
            </svg>
            {{ __('Назад') }}
        </a>
    @endif
    @if ($routeLogin)
        <a href="{{ route('auth.signup') }}" class="authentication-back-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <path d="M5 4h1a3 3 0 0 1 3 3 3 3 0 0 1 3-3h1" />
                <path d="M13 20h-1a3 3 0 0 1-3-3 3 3 0 0 1-3 3H5" />
                <path d="M5 16H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1" />
                <path d="M13 8h7a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-7" />
                <path d="M9 7v10" />
            </svg>
            {{ __('Нет аккаунта?') }}
        </a>
    @endif
    @if ($routeReg)
        <a href="{{ route('auth.signin') }}" class="authentication-back-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                <polyline points="10 17 15 12 10 7" />
                <line x1="15" x2="3" y1="12" y2="12" />
            </svg>
            {{ __('Есть аккаунт?') }}
        </a>
    @endif
    <a href="{{ $routeClose ? $routeClose : route('main') }}" class="authentication-back-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    </a>
</div>

<x-sign.logo.logo />
<h1 class="h3 {{ $class }}">
    {{ $slot }}
</h1>
