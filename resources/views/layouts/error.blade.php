@extends('layouts.auth.base')

@section('auth.root')
    @include('includes.header')
    <main class="form-signin w-100 m-auto">
        <div class="authentication">
            <div id="signin-choose">
                <div class="d-flex flex-column text-center">
                    @yield('image')
                    <h1 class="display-5 mb-0">
                        @yield('error')
                    </h1>
                    <p class="fs-6">
                        @yield('message')
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
