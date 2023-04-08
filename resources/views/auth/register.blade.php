@extends('layout.main')
@section('content')
{{-- <x-auth-card>
    <x-slot name="logo"></x-slot>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <x-label for="username" :value="__('Username')" />
            <x-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
        </div>
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
        </div>
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-button class="ml-4">
                {{ __('Register') }}
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
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{route('register')}}">
                                    @csrf
                                    {!! RecaptchaV3::field('register') !!}
                                    <h5 class="pb-3 mb-3 fw-normal" style="letter-spacing: 1px;">Register your account</h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4 form-outline">
                                                <label class="form-label" for="lblfirstname">First name</label>
                                                <input type="text" id="firstname" class="form-control" name="firstname" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-4 form-outline">
                                                <label class="form-label" for="lbllastname">Last name</label>
                                                <input type="text" id="lastname" class="form-control" name="lastname" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="emailaddress">Email address</label>
                                        <input type="email" id="emailaddress" class="form-control" name="email" required/>
                                    </div>

                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="lblpassword">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required/>
                                    </div>


                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="lblconfirmpassword">Confirm Password</label>
                                        <input type="password" id="confirm-password" class="form-control" name="password_confirmation" required/>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" value="Register">Register</button>
                                    </div>
                                </form>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account?
                                    <a href="{{route('login')}}" style="color: #393f81;">Login here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
