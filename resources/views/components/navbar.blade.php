<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ route('guest.index') }}" class="nav-item nav-link">Trang chủ</a>
            <a href="{{ route('guest.shop') }}" class="nav-item nav-link">Sản phẩm</a>
            <a href="{{ route('guest.contact.index') }}" class="nav-item nav-link">Liên hệ</a>
            <a href="{{ route('guest.about.index') }}" class="nav-item nav-link">Giới thiệu</a>
            <a href="{{route('guest.about.helpp') }}" class=" nav-item nav-link">Hướng dẫn mua hàng</a>
            <a href="{{route('guest.account.index')}}" class=" nav-item nav-link">Tra cứu đơn hàng</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            @if (Auth::check())

            <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; border-radius: 10px;background-color: hsl(0deg 0% 60.93%)">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                    <path fill="#ffffff" d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                </svg>
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

            @else
            <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; border-radius: 10px;background-color: hsl(0deg 0% 60.93%)">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                    <path fill="#ffffff" d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                </svg>
            </button>
            <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: auto;">
                <a href="{{ 'login' }}" class="dropdown-item a">Đăng nhập</a>
                <a href="{{ 'register' }}" class="dropdown-item">Đăng kí</a>
            </div>
            @endif
        </div>
    </div>
</nav>