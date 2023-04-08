@extends('layout.main')
@section('content')
{{-- <x-auth-card>
    <x-slot name="logo"></x-slot>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <x-button class="ml-3">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-auth-card> --}}


<section style="background-color: #F6F6F6;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" /> --}}
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="p-4 text-black card-body p-lg-5">

                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{route('login')}}">
                                    @csrf
                                    <h5 class="pb-3 mb-3 fw-normal" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="lblemail">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control" required/>

                                    </div>

                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="lblpassword">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required/>

                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                </form>
                                    <a class="small text-muted" href="{{route('password.request')}}">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account?
                                        <a href="{{route('register')}}" style="color: #393f81;">Register here</a>
                                    </p>
                                    <a href="{{route('terms')}}" class="small text-muted">Terms of use.</a>
                                    <a href="{{route('privacy')}}" class="small text-muted">Privacy policy</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
