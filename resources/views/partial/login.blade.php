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

                {{-- <div class="flex items-center justify-end mt-4">

                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>

                    <x-button class="ml-4">
                        {{ __('Log in') }}
                    </x-button>
                </div> --}}

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
