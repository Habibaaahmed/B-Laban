@extends('layouts.app')
@section('title', 'Login')
@section('content')

<style>
    body {
        font-family: "Roboto", sans-serif;
        background-color: #003060; /* Background color of the entire page */
        margin: 0;
        padding: 0;
    }

    .bg-custom {
        background-color: #003060; /* Page background color */
    }

    .card {
        background-color:  rgba(255, 255, 255, 0.7);
        border: none;
        border-radius: 0.5rem;
        padding: 1rem;
    }
    .go-to{
        color: #0B629E; 
    }
    .btn-custom {
        background-color: #0B629E; /* Button background color */
        border: none; /* Remove border */
        color: white; /* Button text color */
    }

    .btn-custom:hover {
        background-color: #003060; /* Darker shade for hover effect */
        color: white; /* Ensure text remains white on hover */
    }
    .separator {
        margin: 1rem 0;
        text-align: center;
        position: relative;
        color: #0B629E;
    }
    .separator::before, .separator::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 40%;
        height: 1px;
        background: #0B629E;
        z-index: 1;
    }

    .separator::before {
        left: 0;
    }

    .separator::after {
        right: 0;
    }

    .separator span {
  
        padding: 0 1rem;
        position: relative;
        z-index: 2;
    }
</style>

<section class="bg-custom">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm py-3 px-4">
                        <div class="text-center py-2 mb-3">
                            <p class="mb-0 text-uppercase fw-bold text-secondary">
                               <img src="{{ asset('images/logo.png') }}" alt="B laban" style="max-width: 100%; height: auto;">
                            </p>
                        </div>
                        <form class="row gy-3" action="{{ url('login') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label for="emailInp" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailInp" name="email" value="{{ old('email') }}">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12">
                                <label for="passInp" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passInp" name="password">
                                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12">
                                <button class="btn-custom btn btn-primary w-100 " type="submit">Login</button>
                            </div>
                        </form>
                        <div class="separator">
                            <span>or</span>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-outline-danger w-100" href="{{ url('auth/google') }}">
                                <img src="{{ asset('images/google.png') }}" alt="Sign in with Google" style="max-width: 20px; vertical-align: middle;"> Sign in with Google
                            </a>
                        </div>
                        <div class="mt-3 text-center">
                            <p class="mb-0">
                            Don't have an account?
                                <a class="go-to fw-medium" href="{{ url('register') }}">
                                    Sign up
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
