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
    <section class="cartPage">
        <div class="container">
            <div class="row">
{{dd($cartCollections)}}
                @if(count($cartCollections) > 0)
                    <div class="col-lg-8 col-md-12 p-1">

                        @foreach($cartCollections as $cartCollection)
                            <div class="cartProduct">
                                <div class="row align-items-center">

                                    <div class="col-4 p-1"><img
                                            src="{{ $cartCollection['attributes']['image'] }}"></div>

                                    <div class="col-8 p-1">
                                        <div class="CartInfo">
                                            <p class="unit-name"> {{ trans('web_lang.product name') }} : <a
                                                    href="{{ url('product-details').'?product_id='.$cartCollection['id'] }}">{{ $cartCollection['name'] }}</a>
                                            </p>
                                            <p class="unit-amount"> {{ trans('web_lang.unit price') }} :
                                                <span>{{ $cartCollection['price'] }} {{trans('web_lang.ID')}}</span>
                                            </p>
{{--                                            <p class="unit-amount"> {{ trans('web_lang.the shop') }} :--}}
{{--                                                <span>{{ @\App\Models\Product::find($cartCollection['id'])->user_rl->name }}</span>--}}
{{--                                            </p>--}}
                                            <div class="d-flex justify-content-between"
                                                 style="align-items: flex-end;">
                                                <div class="input-counter">
                                                    <input style="max-width: 130px;height: 40px;"
                                                           product-id="{{ $cartCollection['id'] }}"
                                                           class="cart_update QtyItem" min="1"
                                                           id="{{ $cartCollection['id'] }}" max=""
                                                           value="{{ $cartCollection['quantity'] }}" type="number">
                                                </div>
                                                <p class="total-amount"> {{ trans('web_lang.Total') }}:
                                                    <span>{{ cart_get_total() }} {{trans('web_lang.ID')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="CartControl">
                                            <a class="trash"
                                               href="{{ url('delete_cart?product_id='.$cartCollection['id']) }}"><i
                                                    class="fal fa-times"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-4 col-md-12 p-1">
                        @include('front.cart.components.total_cart', ['type' => 'cart'])
                    </div>
                @else
{{--                    @include('website.inc.NotFound')--}}
                @endif

            </div>
        </div>
    </section>
    <section class="cart">
        <div class="container">
            <!-- min_width991 -->
            <div class="min_width991">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cartDerails">
                                <!-- img -->
                                <div class="img">
                                    <img src="img/man/men.jpg" alt="">
                                </div>
                                <!-- cartInfo -->
                                <div class="cartInfo">
                                    <p>
                                        ولادي اطفال
                                    </p>
                                    <p>
                                        <span>+4</span>
                                        <span>1600</span>
                                        <span>IQD</span>
                                    </p>
                                </div>
                                <!-- delete -->
                                <div class="delete">
                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <hr>
                        <div class="col-12">
                            <div class="cartDerails">
                                <!-- img -->
                                <div class="img">
                                    <img src="img/man/men.jpg" alt="">
                                </div>
                                <!-- cartInfo -->
                                <div class="cartInfo">
                                    <p>
                                        ولادي اطفال
                                    </p>
                                    <p>
                                        <span>+4</span>
                                        <span>1600</span>
                                        <span>IQD</span>
                                    </p>
                                </div>
                                <!-- delete -->
                                <div class="delete">
                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


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
                            <p>16000</p>
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

                                <a class="" href="index.html">
                                    <i class="fa-regular fa-angle-right"></i>
                                </a>
                                <h3>
                                    السلة_توب كيدز
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="cartDerails">
                                    <!-- img -->
                                    <div class="img">
                                        <img src="img/man/men.jpg" alt="">
                                    </div>
                                    <!-- cartInfo -->
                                    <div class="cartInfo">
                                        <p>
                                            ولادي اطفال
                                        </p>
                                        <p>
                                            <span>+4</span>
                                            <span>1600</span>
                                            <span>IQD</span>
                                        </p>
                                    </div>
                                    <!-- delete -->
                                    <div class="delete">
                                        <button class="btn" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <hr>
                            <div class="col-12">
                                <div class="cartDerails">
                                    <!-- img -->
                                    <div class="img">
                                        <img src="img/man/men.jpg" alt="">
                                    </div>
                                    <!-- cartInfo -->
                                    <div class="cartInfo">
                                        <p>
                                            ولادي اطفال
                                        </p>
                                        <p>
                                            <span>+4</span>
                                            <span>1600</span>
                                            <span>IQD</span>
                                        </p>
                                    </div>
                                    <!-- delete -->
                                    <div class="delete">
                                        <button class="btn" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


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
                                <p>16000</p>
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

