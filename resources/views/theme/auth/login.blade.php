@extends('theme.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Log In</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Log In</button>
                <div class="mt-3 text-center">
                    <a href="{{ route('register') }}" class="text-black">Create an Account</a> |
                    <a href="forgot_password.php" class="text-white">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
