@props([
    'name' => 'password',
    'funcName' => 'checkOnInput',
    'labelShow' => false,
    'id' => 'password-form1',
    'labelText' => 'Пароль',
    'placeholder' => 'Пароль',
])

<div class="input-group input-password" id="{{ $id }}">
    @if ($labelShow)
        <div>
            <label for="pass-{{ $id }}">{{ __($labelText) }}</label>
            <input type="password" name="{{ $name }}" class="form-control" id="pass-{{ $id }}"
                status="false" placeholder="{{ $placeholder }}" onInput="{{ $funcName }}()"
                value="{{ old('password') }}" required>
        </div>
    @else
        <div class="form-floating">
            <input type="password" name="{{ $name }}" class="form-control" id="pass-{{ $id }}"
                status="false" placeholder="{{ $placeholder }}" onInput="{{ $funcName }}()"
                value="{{ old('password') }}" required>
            <label for="pass-{{ $id }}">{{ __($labelText) }}</label>
        </div>
    @endif
    <a class="input-group-text" onClick="changeShowPassword('{{ $id }}')">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-eye">
            <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
            <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
            <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
            <line x1="2" x2="22" y1="2" y2="22" />
        </svg>
    </a>
</div>
