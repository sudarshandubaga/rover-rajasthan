@extends('admin.layouts.app')

@section('title', 'Login | ' . $site->title)

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Welcome to<br />{{ $site->title }}! 👋</h4>
                        <p class="mb-4">Please sign in to your account.</p>

                        <x-alert />

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="login_name" class="form-label">Username</label>
                                <input type="text" id="login_name" name="login_name" class="form-control"
                                    placeholder="Enter your username" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="********">
                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="rememberMe" id="remember-me"
                                        value="1">
                                    <label class="form-check-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
