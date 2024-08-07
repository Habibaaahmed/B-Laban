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
                        <form class="row gy-3" action="{{url('register')}}" method="post">
                            @csrf
                            <div class="col-12">
                                <label for="nameInp" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameInp" name="name"
                                    value="{{old('name')}}">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <label for="emailInp" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailInp" name="email"
                                    value="{{old('email')}}">
                                @error('email')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <label for="passInp" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passInp" name="password">
                                @error('password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-12">
                                <button class="btn-custom btn btn-primary w-100" type="submit">Register</button>
                            </div>
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