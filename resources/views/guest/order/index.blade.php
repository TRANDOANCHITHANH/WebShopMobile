@extends('layouts.default')
@push('css')
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
                        <span class="title-main">Hóa đơn</span>
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
                                Hóa đơn
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Order Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-12 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <table class="table container table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Tên Người Nhận</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Số điện thoại</th>
                                    <th scope="col" class="text-center">Địa Chỉ</th>
                                    <th scope="col" class="text-center">Ngày Đặt Hàng</th>
                                    <th scope="col" class="text-center">Số Lượng</th>
                                    <th scope="col" class="text-center">Đơn Giá</th>
                                    <th scope="col" class="text-center">Phí Vận Chuyển</th>
                                    <th scope="col" class="text-center">Tình Trạng</th>
                                    <th scope="col" class="text-center">Ghi chú</th>
                                    <th scope="col" class="fix text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp

                                @forelse ($listOrder as $item)
                                <tr>
                                    <td scope="col" class="align-middle text-center">{{ ++$i }}</td>
                                    <td scope="col" class="align-middle text-center">{{ $item['user']['name'] }}
                                    </td>
                                    <td scope="col" class="align-middle text-center">{{ $item['user']['email'] }}
                                    </td>
                                    <td scope="col" class="align-middle text-center">{{ $item['address'] }}</td>
                                    <td scope="col" class="align-middle text-center">{{ $item['created_at'] }}
                                    </td>
                                    <td scope="col" class="align-middle text-center">{{ $item['quantity'] }}</td>
                                    <td scope="col" class="align-middle text-center">{{ $item['total_price'] }}
                                    </td>
                                    <td scope="col" class="align-middle text-center">{{ $item['price_ship'] }}
                                    </td>

                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-product col-12 row">
                </div>
                <div class="col-12 pb-1" id="pagination">

                </div>
            </div>
        </div>
        <!-- Order Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection
@push('js')
<script src={{ asset('js/pagination.js') }}></script>
<script>
    $(document).ready(function() {})
</script>
@endpush