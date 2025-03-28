@extends('layouts.default')
@push('css')
<style>
    .item-color {
        color: black;
        border: 1px solid #ebebeb;
        padding: 10px 10px 10px 10px;
        font-weight: 700;
    }

    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
        color: #000000;
    }

    .color-active {
        background-color: #e7ab3c;
    }

    .sc-item label {
        width: auto !important;
        padding-left: 5px;
        padding-right: 5px;
    }

    .sc-item label {
        font-size: 16px;
        color: #252525;
        /* font-weight: 700; */
        height: 40px;
        width: 47px;
        border: 1px solid #ebebeb;
        text-align: center;
        line-height: 40px;
        text-transform: uppercase;
        cursor: pointer;
        border-radius: 10px;
    }

    .sc-item label.active {
        border: 1px solid rgb(223, 13, 13);
        color: rgb(0, 0, 0);
    }

    .img-product {
        height: 15rem;
    }
</style>
@endpush
@section('content')
@php
use App\Enums\TypeSizeEnum;
@endphp
<!-- Page Header Start -->
<div class="container-fluid bg-secondary px-xl-5">
    <div class="d-flex flex-column justify-content-center" style="min-height: 50px">
        <div class="d-inline-flex">
            <p class="m-0"><a style="color:rgb(0, 0, 0);" href="{{route('guest.index')}}">Trang Chủ</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Chi Tiết / </p>
            <p>
                {{ $product['name'] }}
            </p>
        </div>
    </div>
</div>

<!-- Page Header End -->
<!-- Shop Detail Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5 col-box">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                @php
                $index = array_search($idSize, array_column($product['product_size'], 'id')) ?? 0;
                @endphp
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-80 h-100" src="{{ asset('storage/Product' . '/' . $product['img'][0]['path']) }}"
                            alt="Image">
                    </div>
                    @forelse ($product['product_size'][$index]['img'] as $item)
                    <div class="carousel-item">
                        <img class="w-80 h-100" src="{{ asset('storage/ProductSize' . '/' . $item['path']) }}"
                            alt="Image">
                    </div>
                    @empty
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 col-box">
            <h3 class="font-weight-semi-bold">{{ $product['name'] }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">
                {{ number_format($product['product_size'][$index]['price_sell'], 0, ',', ',') }} Đ
            </h3>
            <div class="d-flex mb-3 align-items-center">
                <p class="text-dark font-weight-medium mb-0 mr-3">Dung lượng:</p>
                <form>
                    @foreach ($product['product_size'] as $key => $item)
                    {{-- <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" {{ $index == $key ? 'checked' : '' }} class="custom-control-input"
                    id="size-{{ $item['id'] }}" name="size">
                    <label class="custom-control-label" for="size-{{ $item['id'] }}">{{ $item['size'] }}
                        {{ TypeSizeEnum::getName($item['type_size']) }}</label>
            </div> --}}
            <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $item['size'], 'type' => $item['type_size']]) }}"
                class="sc-item">
                {{-- <input type="radio"> --}}
                <label for="sm-size"
                    class="{{ $idSize ? ($idSize == $item['id'] ? 'active' : '') : ($loop->first ? 'active' : '') }}">
                    {{ $item['size'] }} {{ TypeSizeEnum::getName($item['type_size']) }}</label>
            </a>
            @endforeach
            </form>
        </div>
        @php
        $isEmpty = false;
        @endphp
        @if ($product['product_size'][$index]['product_color'])
        <div class="d-flex mb-4 ">
            <p class="text-dark font-weight-medium mb-0 mr-3">Màu:</p>
            {{-- @php
                        dd($product['product_size'][$index]['product_color']);
                    @endphp --}}
            <form>
                @forelse ($product['product_size'][$index]['product_color'] as $item)
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input color"
                        {{ $item['quantity'] && $loop->first ? 'checked' : '' }} value="{{ $item['id'] }}"
                        id="color-{{ $item['id'] }}" name="color">
                    <label class="custom-control-label"
                        for="color-{{ $item['id'] }}">{{ $item['color']['name'] }}</label>
                </div>
                @empty
                <div class="custom-control custom-radio custom-control-inline">
                    <label class="" for="color-{{ $item['id'] }}">hiện đang không có
                        sản phẩm</label>
                </div>
                @endforelse
            </form>
        </div>
        <div class="d-flex mb-4 ">
            <p class="text-dark font-weight-medium mb-0 mr-3">Số lượng:</p>
            <form>
                <div class="">
                    @if (!$product['product_size'][$index]['product_color'][0]['quantity'])
                    @php
                    $isEmpty = true;
                    @endphp
                    @endif
                    <span
                        id="quantity">{{ $product['product_size'][$index]['product_color'][0]['quantity'] }}</span>
                    sản
                    phẩm
                </div>
            </form>
        </div>
        @else
        @php
        $isEmpty = true;
        @endphp
        Hiện không có sản phẩm nào
        @endif
        <div class="d-flex align-items-center mb-4 pt-2">
            <div class="input-group quantity mr-3" style="width: 130px;">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-minus" {{ $isEmpty ? 'disabled' : '' }}>
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" id="count" {{ $isEmpty ? 'disabled' : '' }}
                    class="form-control bg-secondary text-center" value="1">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-plus" {{ $isEmpty ? 'disabled' : '' }}>
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            @if (auth()->check())
            <button class="btn btn-primary px-3 add-to-cart" {{ $isEmpty ? 'disabled' : '' }}><i
                    class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary px-3 add-to-cart"><i
                    class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</a>
            @endif
        </div>
        <div class="d-flex pt-2">
            <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
            <div class="d-inline-flex">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" style="color:#000000;" href="#tab-pane-1">Description</a>
            <a class="nav-item nav-link" style="color:#000000;" data-toggle="tab" href="#tab-pane-2">Information</a>
            <a class="nav-item nav-link" style="color:#000000;" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3">Mô tả sản phẩm</h4>
                <p>{{ $product['descipition'] }}.</p>
            </div>
            <div class="tab-pane fade" id="tab-pane-2">
                <h4 class="mb-3">Additional Information</h4>
                <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                    duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                    invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                    rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                    consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                    ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                    sanctus eirmod takimata dolor ea invidunt.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                style="width: 45px;">
                            <div class="media-body">
                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                <div class="text-primary mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                    at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Leave a review</h4>
                        <small>Your email address will not be published. Required fields are marked *</small>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Your Rating * :</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Your Review *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h3 class="section-title px-5"><span class="px-2">Sản phẩm tương tự</span></h3>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @forelse ($relateProduct as $item)
                <div class="card product-item border-0" style="width: 250px;">
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid img-product"
                                src="{{ asset('storage/Product' . '/' . $item['img'][0]['path']) }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $item['name'] }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($item['product_size'][0]['price_sell'], 0, ',', ',') }} đ</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                            <a href="{{ route('guest.detail', ['slug' => $item['slug'], 'size' => $item['product_size'][0]['size'], 'type' => $item['product_size'][0]['type_size']]) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
</div>
<!-- Products End -->
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.28/dist/sweetalert2.all.min.js"></script>
@include('guest.includes.script_product_detail')
@endpush