{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @extends('partial.master')

        @section('title', 'Login Front Page')

        @section('content')

        <div class="card w-75 m-auto ">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card-body">
                <div class="login-form">
                    <form action="{{ url('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input class="au-input au-input--full form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input class="au-input au-input--full form-control" type="password" name="password" placeholder="Password">
                        </div>

                        <button class="btn btn-primary m-b-20 mt-4" type="submit">sign in</button>

                    </form>
                    <div class="register-link mt-4">
                        <p>
                            Don't you have account?
                            <a href="{{ route('registerPage') }}">Sign Up Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}



@extends('partial.master')

@section('title', 'Login Front Page')

@section('content')

<div class="card w-75 m-auto ">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card-body">
        <div class="login-form">
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input class="au-input au-input--full form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="au-input au-input--full form-control" type="password" name="password" placeholder="Password">
                </div>

                <button class="btn btn-primary m-b-20 mt-4" type="submit">sign in</button>

            </form>
            <div class="register-link mt-4">
                <p>
                    Don't you have account?
                    <a href="{{ route('registerPage') }}">Sign Up Here</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
