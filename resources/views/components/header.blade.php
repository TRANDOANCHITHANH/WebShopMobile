<div class="container-fluid" style="background: #d70018;">
    <div class="row align-items-center px-xl-5" style="padding-top:10px; padding-bottom: 10px;">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{ route('guest.index') }}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="font-weight-bold border px-3 mr-1" style="color:#ffffff;">5S Store</span></h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm sản phẩm" style="border-radius: 10px 0 0 10px">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="{{ route('guest.liked.index') }}" class="btn borderr">
                <i class="fas fa-heart" style="color: #ffffff"></i>
                <span class="badge">{{ $quantityLiked }}</span>
            </a>
            <a href="{{ route('guest.cart.index') }}" class="btn borderr">
                <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                <span class="badge">{{ $quantityCart }}</span>
            </a>
        </div>
        <!-- <div class="col-lg-3 col-6">

        </div> -->

        <!-- <div class="col-lg-9 col-6">
            <div class="navbar-nav mr-auto py-0" style="flex-direction: row;">
                <a href="{{ route('guest.index') }}" class="nav-item nav-link" style="padding: 10px;">Trang chủ</a>
                <a href="{{ route('guest.shop') }}" class="nav-item nav-link" style="padding: 10px;">Sản phẩm</a>
                <a href="{{ route('guest.contact.index') }}" class="nav-item nav-link" style="padding: 10px;">Liên hệ</a>
                <a href="{{ route('guest.about.index') }}" class="nav-item nav-link" style="padding: 10px;">Giới thiệu</a>
                <a href="{{route('guest.about.helpp') }}" class=" nav-item nav-link" style="padding: 10px;">Hướng dẫn mua hàng</a>
                <a href="{{route('guest.coupon.index')}}" class=" nav-item nav-link" style="padding: 10px;">Phiếu giảm giá</a>
                <div class="navbar-nav ml-auto py-0">
                    @if (Auth::check())
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; border-radius: 10px;background-color: hsla(0, 0%, 100%, .2);">
                            {{ Auth()->user()->name }}
                        </button>
                        <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: auto;">
                            <a class="dropdown-item" href="{{ route('guest.account.index') }}">Thông tin</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; border-radius: 10px;background-color: hsla(0, 0%, 100%, .2);">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#ffffff" d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                        </svg>
                    </button>
                    <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: auto;">
                        <a href="{{ 'login' }}" class="dropdown-item">Login</a>
                        <a href="{{ 'register' }}" class="dropdown-item">Register</a>
                    </div>
                    @endif
                </div>
            </div>

        </div> -->
    </div>
</div>