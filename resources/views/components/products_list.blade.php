@foreach ($products as $product)
<div class="col-lg-2 col-md-4 col-sm-6 mb-4">
    <div class="card product-item border-0">
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
@endforeach