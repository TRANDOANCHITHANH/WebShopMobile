@extends('layouts.default')
@push('css')
<link rel="stylesheet" href="{{ asset('css/guest/product.css') }}">

@endpush
@section('content')
@php
use App\Enums\TypeSizeEnum;
@endphp
<!-- Page Header Start -->

<div class="product-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="product-header-content">
                    <h1 class="product-title">
                        <span class="title-main">Sản Phẩm</span>
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
                                Sản Phẩm
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Color Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Nhãn hàng</h5>
                <form>
                    @forelse ($brands as $item)
                    <div
                        class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input brand" value="{{ $item['id'] }}"
                            id="brand-{{ $item['id'] }}">
                        <label class="custom-control-label"
                            for="brand-{{ $item['id'] }}">{{ $item['name'] }}</label>
                        <span class="badge border font-weight-normal">{{ $item['quantity'] }}</span>
                    </div>
                    @empty
                    @endforelse
                </form>
            </div>
            <!-- Color End -->

            <!-- Size Start -->
            <div class="mb-5">
                <div class="filter-widget">
                    <h4 class="fw-title">Danh mục</h4>
                    <div class="fw-brand-check">
                        <li>
                            <input type="radio" class="mr-2 category" name="categories" value=""
                                id="category-all">
                            <label for="category-all">Tất cả</label>
                        </li>
                        {!! menuMultipleLevel($categories, 0) !!}
                    </div>
                </div>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div action="">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" placeholder="Search by name">
                                <div class="input-group-append search">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-product col-12 pb-4 row">
                </div>
                <div class="col-12 pb-1" id="pagination">

                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection
@push('js')
<script src={{ asset('js/pagination.js') }}></script>
@include('guest.includes.script_product')
@endpush