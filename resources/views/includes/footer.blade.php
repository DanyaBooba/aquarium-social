<footer class="footer py-3 mt-4">
    <div class="container">
        <div class="footer__main">
            <span>© 2020-{{ date('Y') }}</span>
            <a href="{{ route('main') }}">
                {{ __('Аквариум') }}
            </a>
        </div>
        <div class="footer__social">
            <div class="footer__privacy">
                <a href="{{ route('main.terms') }}">{{ __('Правила') }}</a>
            </div>
            <div class="footer__language">
                <a href="{{ route('main.setlocale', 'ru') }}"
                    class="{{ footer_locale_active_link('ru') }}">{{ __('ru') }}</a>
                <a href="{{ route('main.setlocale', 'en') }}"
                    class="{{ footer_locale_active_link('en') }}">{{ __('en') }}</a>
            </div>
        </div>
    </div>
</footer>
