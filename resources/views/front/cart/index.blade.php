@extends('front/layouts/app')
@section('content')

    <section class="breadCrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </section>
    <!-- profile -->
    <!--  Cart  -->

    <section class="cart">
        <div class="container">
            <!-- min_width991 -->
            <div class="min_width991">
                <div class="container">
                    <div class="row">
                        @forelse($cartCollections as $cartCollection)
                        <div class="col-12">
                            <div class="cartDerails">
                                <!-- img -->
                                <div class="img">
                                    <img src="{{$cartCollection['attributes']['image']}}" alt="">
                                </div>
                                <!-- cartInfo -->
                                <div class="cartInfo">
                                    <p>
                                        {{$cartCollection['name']}}
                                    </p>
                                    <p>
                                    <div class="input-counter">
                                        <input style="max-width: 130px;height: 40px;"
                                               product-id="{{ $cartCollection['id'] }}"
                                               class="cart_update QtyItem" min="1"
                                               id="{{ $cartCollection['id'] }}" max=""
                                               value="{{ $cartCollection['quantity'] }}" type="number">
                                    </div>
                                        <span>x {{ $cartCollection['quantity'] }}</span>
                                        <span>{{ $cartCollection['quantity'] }} x {{ $cartCollection['price'] }}</span>
                                        <span>IQD</span>
                                    </p>
                                </div>
                                <!-- delete -->
                                <div class="delete">
                                    <a class="trash"
                                       href="{{ url('delete_cart?product_id='.$cartCollection['id']) }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <hr>
                        @empty
                            <div class="alert alert-info">لا يوجد منتجات مضافة</div>
                        @endforelse

                    </div>
                    <!-- buttonBuy +price -->
                    <div class="buttonBuy">
                        <!-- buttonBuy -->
                        <button class="btn" type="button">
                            <a href="#!">اتمام الشراء</a>
                        </button>
                        <!-- price -->
                        <div class="price">
                            <p>المجموع</p>
                            <p>{{ cart_get_total() }}</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- min_width991 -->
            <div class="full_page">
                <div class="max_width991">
                    <div class="container">
                        <div class="angle">
                            <div class="angle2">
                                <a class="" href="{{url('/')}}">
                                    <i class="fa-regular fa-angle-right"></i>
                                </a>
                                <h3>
                                    السلة_توب كيدز
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            @forelse($cartCollections as $cartCollection)
                                <div class="col-12">
                                    <div class="cartDerails">
                                        <!-- img -->
                                        <div class="img">
                                            <img src="{{$cartCollection['attributes']['image']}}" alt="">
                                        </div>
                                        <!-- cartInfo -->
                                        <div class="cartInfo">
                                            <p>
                                                {{$cartCollection['name']}}
                                            </p>
                                            <p>
                                            <div class="">
                                                <input style="max-width: 130px;height: 40px;"
                                                       product-id="{{ $cartCollection['id'] }}"
                                                       class="cart_update QtyItem" min="1"
                                                       id="{{ $cartCollection['id'] }}" max=""
                                                       value="{{ $cartCollection['quantity'] }}" type="number">
                                            </div>
                                            <span>x {{ $cartCollection['quantity'] }}</span>
                                            <span>{{ $cartCollection['quantity'] }} x {{ $cartCollection['price'] }}</span>
                                            <span>IQD</span>
                                            </p>
                                        </div>
                                        <!-- delete -->
                                        <div class="delete">
                                            <a class="btn trash"
                                               href="{{ url('delete_cart?product_id='.$cartCollection['id']) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <hr>
                            @empty
                                <div class="alert alert-info">لا يوجد منتجات مضافة</div>
                            @endforelse



                        </div>
                        <!-- buttonBuy +price -->
                        <div class="buttonBuy">
                            <!-- buttonBuy -->
                            <button class="btn" type="button">
                                <a href="#!">اتمام الشراء</a>
                            </button>
                            <!-- price -->
                            <div class="price">
                                <p>المجموع</p>
                                <p>{{ cart_get_total() }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.general_components.ajax-code')

    <script src="{{asset('/assets/front/')}}/js/popper.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/dropify.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/intlTelInput.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/utils.js"></script>
@endsection
@section('js')

    <script>


    </script>
@endsection

