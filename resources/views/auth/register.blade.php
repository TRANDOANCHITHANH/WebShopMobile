@extends('layouts.default')

@section('content')

<section class="">
    <div class=" container-fluid h-custom">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-3">
                <img src="{{ asset('uploads/a51397cd-8658-4980-b7d1-507a91b1453f.webp') }}"
                    class="img-fluid" alt="Sample image"
                    style="border-radius: 10px;">

            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="logo-page col-md-10" style="text-align: right">
                    <img src="{{ asset('uploads/5Slogo.png') }}" class="img-fluid" alt="Sample image" style="width: 200px; height: 150px;">
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ email') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="col-md-8 offset-md-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tạo Tài Khoản') }}
                        </button>
                        <a href="{{'login'}}" class="btn btn-link">
                            {{ __('Trở lại đăng nhập') }}
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection