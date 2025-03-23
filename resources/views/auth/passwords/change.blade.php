@extends('layouts.default')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Thay đổi mật khẩu</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>⚠ Lỗi!</strong> Vui lòng kiểm tra lại thông tin.
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->
                    <form method="POST" action="{{ route('guest.account.password.update') }}">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Mật khẩu hiện tại</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                            @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">Mật khẩu mới</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                        <a href="{{ route('guest.account.index') }}" class="btn btn-secondary">Trở về</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection