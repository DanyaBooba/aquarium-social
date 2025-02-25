@props([
    'mobile' => false,
    'pc' => false,
    'attr' => '',
    'url' => '',
    'itsme' => false,
    'class' => '',
])

@props([
    '_mobile' => $mobile ? 'user-button-mobile' : '',
    '_pc' => $pc ? 'user-button-pc' : '',
    '_disabled' => $itsme ? 'disabled' : '',
    '_onclick' => $url ? 'onclick=buttonOpenURL("' . $url . '")' : '',
])

<button type="button" class="btn {{ $_mobile }} {{ $_pc }} {{ $class }}" {{ $attr }}
    {{ $_onclick }} {{ $_disabled }}>
    {{ $slot }}
</button>
