@extends('layouts.default')

@section('content')
<style>
    .login-container {
        background: white;
        margin: 30px;
        padding: 10px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
    }

    .login-container img {
        display: block;
        margin: 0 auto 15px;
    }

    .mt-3 a {
        color: black;
    }
</style>
<section class="d-flex justify-content-center align-items-center">
    <div class="login-container text-center">
        <img src="{{ asset('uploads/5Slogo.png') }}" alt="Logo" style="width: 200px;">
        <h4 class="mb-4">Đăng Nhập</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
            </div>

            <div class="form-check mb-3 text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>

            <div class="mt-3">
                <a href="{{ route('password.request') }}" class="text-decoration-none">Quên mật khẩu?</a>
                <span class="mx-2">|</span>
                <a href="{{'register'}}" class="text-decoration-none">Tạo tài khoản</a>
            </div>
        </form>
    </div>
</section>
@endsection