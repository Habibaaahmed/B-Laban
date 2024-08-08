@extends('layouts.app')
@section('title', 'Register')
@section('content')

<style>
    .bg-custom {
        background-color: #003060;
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
        background-color: #0B629E;
        border: none;
        color: white;
    }

    .btn-custom:hover {
        background-color: #003060;
        color: white;
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
                        <form class="row gy-3"action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn-custom btn btn-primary w-100">Register</button>
</form>

                        <div class="mt-3 text-center">
                            <p class="mb-0">
                                Already have an account?
                                <a class="go-to fw-medium" href="{{url('login')}}">
                                    Login
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
