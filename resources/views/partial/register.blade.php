@extends('partial.master')

@section('title', 'Register Page')

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
            <form action="{{ route('register') }}" method="post">
                @csrf
                @error('terms')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="au-input au-input--full form-control" type="text" name="name" placeholder="Username">
                </div>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input class="au-input au-input--full form-control" type="email" name="email" placeholder="Email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input class="au-input au-input--full form-control" type="number" name="phone" placeholder="09xxxxxxxx">
                </div>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input class="au-input au-input-- form-control" type="text" name="address" placeholder="Address">
                </div>
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="au-input au-input--full form-control" type="password" name="password" placeholder="Password">
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label class="form-label">Password Confirmation</label>
                    <input class="au-input au-input--full form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <button class="btn btn-primary m-b-20 mt-4" type="submit">register</button>

            </form>
            <div class="register-link mt-4">
                <p>
                    Already have account?
                    <a href="{{ route('loginPage') }}">Sign In</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

