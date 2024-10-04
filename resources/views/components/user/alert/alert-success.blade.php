@props(['title' => ''])

<div class="container" style="padding-left: .6rem !important; padding-right: .6rem !important;">
    <x-user.alert.alert :close=false type="alert-success" name="alert-success">
        {{ $title }}
    </x-user.alert.alert>
</div>
