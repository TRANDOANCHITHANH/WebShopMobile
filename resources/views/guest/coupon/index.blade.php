@extends('layouts.default')
@push('css')
<style>
    .link:hover {
        color: blue !important;
    }

    .grouplist {
        background: #eeeeee;
        border-radius: 5px;
        padding: 1rem;
        position: relative;
    }

    .div-img {
        height: 5rem;
    }

    .div-img img {
        height: 100%;
    }
</style>
@section('content')
<!-- Page Header Start -->

<div class="product-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="product-header-content">
                    <h1 class="product-title">
                        <span class="title-main">Phiếu giảm giá</span>
                        <!-- <span class="title-line"></span> -->
                    </h1>
                    <nav aria-label="breadcrumb" class="justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('guest.index') }}" class="text-dark">
                                    <i class="fas fa-home mr-2"></i>Trang Chủ
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-muted" aria-current="page">
                                Phiếu giảm giá
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div>
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h4 class="row border-bottom ml-3 mt-4 mb-3">Danh sách phiếu giảm giá</h4>
        <div class="row">

            @forelse ($discounts as $item)
            <div class="mb-4 col-6">
                <div class="w-100 grouplist">
                    <div class="offer-text" style="position: relative;width:50%;z-index: 1">
                        <h6 class="text-white text-uppercase" style="font-weight: 800;color: #000000d9 !important">
                            {{ $item['name'] }}
                        </h6>
                        <h3 class="text-white" style="font-weight: 300;color:#040404d9 !important;">
                            Giảm {{ number_format($item['price'], 0, ',', ',') }} Đ
                        </h3>
                        @if ($currentDateTime->greaterThan($time_discount))
                        <div class="mb-1">Từ {{ $item['begin'] }} đến
                            {{ $item['end'] }}
                        </div>
                        @else
                        <div class="mb-2">Đã hết hạn</div>
                        @endif
                    </div>
                    <div>

                        @if (Auth::check())
                        <form action="{{ route('guest.coupon.register_coupon') }}" method="post">
                            {{-- //['id' => $item['id']]  --}}
                            @csrf
                            <input type="hidden" name="id" id="" value="{{ $item['id'] }}">
                            <button class="btn btn-primary">Đăng kí nhận</button>
                        </form>
                        @else
                        <p class="text-danger"> Bạn chưa đăng nhập!
                        </p>
                        @endif

                    </div>
                    <div class="img"
                        style="position: absolute;padding: 0.6rem;top: 0px;right: 0px;width: 50%;height: 100%;z-index:0;">
                        <img style="height: 100%;width:100%;border-radius: 5px;"
                            src="https://chogym.vn/wp-content/uploads/2021/06/ma-giam-gia-chogym.vn_.png"
                            alt="">
                    </div>
                </div>
            </div>
            @empty
            <h4 class="mt-4 mb-4">Hiện bạn không có phiếu giảm giá nào</h4>
            @endforelse
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection