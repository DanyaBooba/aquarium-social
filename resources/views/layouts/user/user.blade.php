@extends('layouts.base')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user/index.css') }}" />
@endpush

@section('body')

    <body class="container-fluid">
        <div class="row row-user min-vh-100">
            <section class="row-user-bar">
                <div class="row-user-bar-container">
                    @include('includes.user.bar')
                </div>
            </section>
            <main class="flex-grow-1 row-user-content">
                @include('includes.user.header')
                @yield('user.alert')
                <section class="py-3">
                    <div class="container px-0">
                        @yield('user.content')
                    </div>
                </section>
            </main>
            @include('includes.user.nav')
        </div>

        <script src="{{ asset('js/module/bootstrap-5.1.1.js') }}"></script>
    </body>
@endsection
