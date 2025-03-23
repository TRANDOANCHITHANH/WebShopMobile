@extends('layouts.default')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush
@section('content')
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Sidebar -->
        <div class="col-lg-2 col-md-12">
            <div class="mb-5">
                <div class="filter-widget">
                    <h4 class="fw-title">Danh mục</h4>
                    <ul class="list-unstyled">
                        <!-- Tất cả danh mục -->
                        <li>
                            <input type="radio" class="mr-2 category" name="categories" value=""
                                id="category-all" {{ empty($selectedCategory) ? 'checked' : '' }}>
                            <label for="category-all">Tất cả</label>
                        </li>

                        @foreach ($categories as $category)
                        @if ($category->parent_id == 0) <!-- Chỉ hiển thị danh mục cha -->
                        <li>
                            <input type="radio" class="mr-2 category"
                                name="categories"
                                value="{{ $category->id }}"
                                id="category-{{ $category->id }}"
                                {{ $selectedCategory == $category->id ? 'checked' : '' }}>
                            <label for="category-{{ $category->id }}">{{ $category->name }}</label>

                            <!-- Hiển thị danh mục con nếu có -->
                            @if ($category->children->count() > 0)
                            <ul class="ml-3">
                                @foreach ($category->children as $child)
                                <li>
                                    <input type="radio" class="mr-2 category"
                                        name="categories"
                                        value="{{ $child->id }}"
                                        id="category-{{ $child->id }}"
                                        {{ $selectedCategory == $child->id ? 'checked' : '' }}>
                                    <label for="category-{{ $child->id }}">{{ $child->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <!-- Product List -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-item animate__animated animate__fadeInUp" style="max-width: 20%;">
                    <div class="card border-0 item-product" style="min-height: 300px;">
                        <div class="card-header position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('guest.detail', ['slug' => $product->slug, 'size' => $product->ProductSize[0]->size, 'type' => $product->ProductSize[0]->type_size]) }}">
                                <img class="img-fluid img-product" src="{{ asset('storage/Product/' . $product->img[0]->path) }}" alt="">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="multiline-truncate mb-3">
                                <a style="color:black; margin-left:5px;" href="{{ route('guest.detail', ['slug' => $product->slug, 'size' => $product->ProductSize[0]->size, 'type' => $product->ProductSize[0]->type_size]) }}">
                                    {{ $product->name }}
                                </a>
                            </h6>
                            <div>
                                <h6>{{ number_format($product->ProductSize[0]->price_sell, 0, ',', ',') }}đ</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                            <form action="{{ route('guest.liked.add_product') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm text-dark p-0">
                                    <i class="fas fa-solid fa-heart text-primary mr-1"></i>Thêm vào yêu thích
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center w-100">Không có sản phẩm nào.</p>
                @endforelse
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $(".category").on("change", function() {
            let categoryId = $(this).val();
            let url = "{{ route('guest.productByCategory') }}?category_id=" + categoryId;
            window.location.href = url;
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".product-item").css("opacity", 0).each(function(index) {
            $(this).delay(100 * index).animate({
                opacity: 1,
                top: "0px"
            }, 500);
        });
    });
</script>
@endpush