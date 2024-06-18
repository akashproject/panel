@extends('administrator.layouts.admin')
@section('content')

<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
        <!-- Forgot Password -->
        <div class="card">
        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="{{ route('website') }}" class="app-brand-link gap-2 text-center">
                <img src="{{ url('assets/administrator/img/logo.png') }}">
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Forgot Password? 🔒</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
            <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                type="text"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="Enter your email"
                autofocus
                />
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100">{{ __('Send Password Reset Link') }}</button>
            </form>
            <div class="text-center">
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
            </a>
            </div>
        </div>
        </div>
        <!-- /Forgot Password -->
    </div>
</div>
@endsection
