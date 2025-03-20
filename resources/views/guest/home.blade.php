@extends('layouts.master')
@push('css')
@endpush
@section('slide')
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($list_banners as $item)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 300px;">
            <img class="img-fluid" src="{{ asset('storage/Banner' . '/' . $item->path) }}" alt="Image">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
@endsection
@section('content')
<!-- Featured Start -->
<div class="container-fluid pt-3">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 col-box">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Thương hiệu đảm bảo</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 col-box">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Giao hàng toàn quốc</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 col-box">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Đổi trả dễ dàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 col-box">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
<!-- Products Start -->
<div class="container-fluid" style="padding: 0px 60px 0px 55px">
    <div class="product-b">
        <div class="mt">
            <h3 class="px-5 pt-3"><span class="highlight-title" style="margin-top:10px;">Sản phẩm nổi bật</span></h3>
        </div>
        <div class="owl-carousel vendor-carousel">

            @foreach ($listOutstanding as $product)
            <div class="item p-2 product-d">

                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="margin: 8px 0px;">
                        <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                            <img class="img-fluid w-100 img-product"
                                src="{{ asset('storage/Product' . '/' . $product['img'][0]['path']) }}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="product-title multiline-truncate mb-3">
                            <a style="color:black; margin-left:5px;"
                                href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                                {{ $product['name'] }}
                            </a>
                        </h6>
                        <div>
                            <h6>{{ number_format($product['ProductSize'][0]['price_sell'], 0, ',', ',') }}đ</h6>
                        </div>
                    </div>

                    {{-- @dd($product['ProductSize'][0]['price_sell']) --}}
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <!-- <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}"
                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>
                    </a> -->
                        <form action="{{ route('guest.liked.add_product') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <button type="submit" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-solid fa-heart text-primary mr-1"></i>Thêm vào yêu thích</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Products End -->
<!-- Products Start -->
<div class="container-fluid pt-5" style="padding: 0px 60px 0px 55px">
    <div class="product-b">
        <div class="mb-4">
            <h3 class="px-5 pt-3"><span class="highlight-title">Sản phẩm bán chạy</span></h3>
        </div>
        <div class="owl-carousel vendor-carousel">
            @foreach ($listSelling as $product)
            <div class="item p-2 product-d">
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                            <img class="img-fluid w-100 img-product"
                                src="{{ asset('storage/Product' . '/' . $product['img'][0]['path']) }}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="multiline-truncate mb-3">
                            <a style="color:black; margin-left:5px;"
                                href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                                {{ $product['name'] }}
                            </a>
                        </h6>
                        <div>
                            <h6>{{ number_format($product['ProductSize'][0]['price_sell'], 0, ',', ',') }}đ</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <!-- <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}"
                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                    </a> -->
                        <form action="{{ route('guest.liked.add_product') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <button type="submit" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-solid fa-heart text-primary mr-1"></i>Thêm vào yêu thích</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Products End -->

<!-- Products by Category Start -->
<!-- Categories List -->
<div class="container">

</div>

<!-- Products List -->
<div class="container-fluid pt-5" style="padding: 0px 60px 0px 55px">
    <div class="product-b">
        <div class="mb-4">
            <h3 class="px-5 pt-3" style="text-align: center;">
                <span class="highlight-title">Sản phẩm mới</span>
            </h3>
            <div class="category-list d-flex flex-wrap justify-content-center gap-3">
                @foreach ($parentCategories->take(7) as $category)
                <div class="category-item">
                    <a href="#" class="category-link" data-category-id="{{ $category->id }}">{{ $category->name }}</a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row px-xl-5 pb-3" id="product-list">
            @include('components.products_list', ['products' => $listProductByCategory ?? []])
            <!-- @foreach ($listProductByCategory ?? [] as $product)
            <div class="item p-2 product-d">
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                            <img class="img-fluid w-100 img-product" src="{{ asset('storage/Product' . '/' . $product['img'][0]['path']) }}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="multiline-truncate mb-3">
                            <a style="color:black; margin-left:5px;" href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                                {{ $product['name'] }}
                            </a>
                        </h6>
                        <div>
                            <h6>{{ number_format($product['ProductSize'][0]['price_sell'], 0, ',', ',') }}đ</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <form action="{{ route('guest.liked.add_product') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <button type="submit" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-solid fa-heart text-primary mr-1"></i>Thêm vào yêu thích
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach -->
        </div>
    </div>
</div>

<!-- Products by Category End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                {{-- brands --}}
                @foreach ($list_brands as $item)
                <div class="vendor-item border p-4">
                    <img style="height:70px" src="{{ asset('storage/Brand' . '/' . $item->path) }}"
                        alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<!-- Vendor End -->
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0, // Giảm khoảng cách xuống còn 5px
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            },
            stagePadding: 0,
            center: false
        });
    });
    $(document).ready(function() {
        $(".vendor-carousel").owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                } // Đảm bảo có 4 sản phẩm trên một hàng khi màn hình lớn
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.category-link').click(function(e) {
            e.preventDefault();

            var categoryId = $(this).data('category-id');

            $.ajax({
                url: '/products-by-category/' + categoryId,
                type: 'GET',
                success: function(response) {
                    $('#product-list').html(response); // Cập nhật danh sách sản phẩm
                },
                error: function() {
                    alert('Lỗi khi lấy sản phẩm!');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                fetch(`/products-by-category/${categoryId}`)
                    .then(response => response.json())
                    .then(products => {
                        let productHtml = '';
                        products.forEach(product => {
                            productHtml += `
                                <div class="item p-2 product-d">
                                    <div class="card product-item border-0">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <a href="{{ route('guest.detail', ['slug' => $product['slug'], 'size' => $product['ProductSize'][0]['size'], 'type' => $product['ProductSize'][0]['type_size']]) }}">
                                                <img class="img-fluid w-100 img-product" src="/storage/Product/${product.img[0].path}" alt="">
                                            </a>
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                            <h6 class="multiline-truncate mb-3">
                                                <a style="color:black; margin-left:5px;" href="">
                                                    ${product.name}
                                                </a>
                                            </h6>
                                            <div>
                                                <h6>{{ number_format($product['ProductSize'][0]['price_sell'], 0, ',', ',') }}đ</h6>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                            <form action="/guest/liked/add_product" method="POST">
                                                <input type="hidden" name="id" value="${product.id}">
                                                <button type="submit" class="btn btn-sm text-dark p-0">
                                                    <i class="fas fa-solid fa-heart text-primary mr-1"></i>Thêm vào yêu thích
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                        document.getElementById('product-list').innerHTML = productHtml;
                    });
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".parent-category, .dropdown-item").on("click", function(e) {
            e.preventDefault();

            let categoryId = $(this).data("id");
            if (!categoryId) return;

            let url = "{{ route('guest.productByCategory') }}?category_id=" + categoryId;
            window.location.href = url;
        });
    });
</script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2500
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi!',
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
</script>
@endif

@endpush