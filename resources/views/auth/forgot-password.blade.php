@extends('layout.main')
@section('content')
{{-- <x-auth-card>
    <x-slot name="logo"></x-slot>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Email Password Reset Link') }}
            </x-button>
        </div>
    </form>
</x-auth-card> --}}

<div class="block-space block-space--layout--after-header"></div>

<div class="block">
    <div class="container container--mx--lg">
        <div class="row">
            <div class="mt-4 col-md-6 d-flex mt-md-0">
                <div class="mb-0 ml-0 mr-0 card flex-grow-1 ml-lg-3 mr-lg-4">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">Forgot Password</h3>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{route('password.email')}}">
                            @csrf
                            <div class="form-group">
                                <label for="signup-email">Email Address</label>
                                <input id="signup-email" type="email" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="mb-0 form-group">
                                <button type="submit" class="mt-3 btn btn-primary">Send Me Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--before-footer"></div>
@endsection
