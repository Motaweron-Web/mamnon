<nav class="navbar navbar-expand">
    <div class="container">
        <!-- logo -->
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('/assets/front/')}}/img/logo.png" alt="logo">
        </a>
        <!-- search -->
        <form class="d-flex search mx-auto">
            <input class="form-control me-2" type="search" placeholder="ابحث عن متجر" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </form>
        <!-- links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}"> الرئيسية </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('view-cart')}}">
                    السلة
                </a>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                {{--                    @if (Route::has('register'))--}}
                {{--                        <li class="nav-item">--}}
                {{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                {{--                        </li>--}}
                {{--                    @endif--}}
            @else

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/profile')}}">
                        الملف الشخصي
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/add_store')}}">
                        اضف متجرك
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/orders')}}">
                        الطلبات
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->firstName }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest


        </ul>

    </div>
</nav>
<!-- responsive navbar -->

<nav class="navebar2">
    <div class="container-fluid">
        <!-- icon -->
        <div class="icon">
            <i class="fa-thin fa-bars-staggered"></i>
        </div>
        <!-- search -->
        <div class="d-flex  mx-auto">
            <div class="img">
                <img src="{{asset('/assets/front/')}}/img/logo2.png" alt="">
            </div>
        </div>
        <!-- links -->
        <div class="links">
            <a class="nav-link" href="cart.html">
                <i class="fa-thin fa-cart-shopping-fast"></i>
            </a>
            <a class="nav-link" href="#!">
                <i class="fa-thin fa-moon"></i>
            </a>

            <i class="fa-thin fa-filters nav-link" id="filterPagesAll"></i>

        </div>
    </div>

</nav>
<!-- sild bar header -->
<div class="sildBar">
    <div class="sildBarDetails">
        <i class="fa-thin fa-xmark"></i>
        <div class="container">
            <div class="logo">
                <img src="{{asset('/assets/front/')}}/img/logo.png" alt="">
            </div>
            <ul class="links">

                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-links" href="{{url('/login')}}">--}}
                {{--                        تسجيل الدخول--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{--                    @if (Route::has('register'))--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--                        </li>--}}
                    {{--                    @endif--}}
                @else

                    <li class="nav-item">
                        <a class="nav-links" href="{{url('/profile')}}">
                            الملف الشخصي
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links" href="{{url('/add_store')}}">
                            اضف متجرك
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links" href="{{url('/orders')}}">
                            الطلبات
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                <li class="nav-item">
                    <a class="nav-links" href="#!">
                        مشاركة التطبيق
                    </a>
                </li>


            </ul>
            <div class="div">
                <p class="text-center">
                    جميع حقوق الملكية الفكرية محفوظة لدي
                    <br>
                    <i class="fa-regular fa-copyright"></i> الراشد العربية
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    $(".icon .fa-bars-staggered").click(function () {
        $('.sildBar').animate({
            right: 0,
        })
    })
    $(".fa-xmark").click(function () {
        $('.sildBar').animate({
            right: '-100vw',
        })
    })

</script>
