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

    <section class="orders">
        <div class="container">
            <div class="min_width991">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="orderFilter">
                                <li>
                                    <h3 data-orders="now" class="active">
                                        الطلبات الحالية
                                    </h3>
                                </li>
                                <li>
                                    <h3 data-orders="prev">
                                        الطلبات السابقة
                                    </h3>
                                </li>
                            </ul>
                        </div>
                        <!--  -->
                        <div class="col-12">
                            <!-- now -->
                            <div id="now">
                                @forelse($orders['now'] as $new_order)

                                    <div class="ordersCard">
                                        <!-- numberOrder -->
                                        <div class="numberOrder d-flex align-items-center">
                                            <p>
                                                رقم الطلب:
                                            </p>
                                            <p>
                                                {{$new_order->data()['orderNumber']}}
                                            </p>
                                        </div>
                                        <!-- detailsOrders -->
                                        <div class="detailsOrders">
                                            <!-- detailsImg -->
                                            <div class="detailsImg">
                                                <div class="img">
                                                    <img src="{{$new_order->data()['storeLogoImage']}}" alt="">
                                                </div>
                                                <p>
                                                    <button>
                                                        بانتظار الموافقة
                                                    </button>
                                                </p>
                                            </div>
                                            <!-- infoOrders -->
                                            <div class="infoOrders">
                                                <div class="info">
                                                    <h5>
                                                        OPBNAYO
                                                    </h5>
                                                    <p>
                                                        <i class="fa-solid fa-calendar-days"></i> <span>{{$new_order->data()['createdDate']}}</span>
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-location-dot"></i> <span>{{$new_order->data()['address']['addressName']}}</span>
                                                    </p>

                                                </div>
                                                <!-- priceOrders -->
                                                <div class="priceOrders">
                                                    <p>السعر الاجمالي:</p>
                                                    <p>{{$new_order->data()['totalAmount']}}</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @empty
                                @endforelse


                                <!--  -->
                            </div>
                            <!-- prev -->
                            <div id="prev">
                                @forelse($orders['prev'] as $prev_order)

                                    <div class="ordersCard">
                                        <!-- numberOrder -->
                                        <div class="numberOrder d-flex align-items-center">
                                            <p>
                                                رقم الطلب:
                                            </p>
                                            <p>
                                                {{$prev_order->data()['orderNumber']}}
                                            </p>
                                        </div>
                                        <!-- detailsOrders -->
                                        <div class="detailsOrders">
                                            <!-- detailsImg -->
                                            <div class="detailsImg">
                                                <div class="img">
                                                    <img src="{{$prev_order->data()['storeLogoImage']}}" alt="">
                                                </div>
                                                <p>
                                                    <button>
                                                        بانتظار الموافقة
                                                    </button>
                                                </p>
                                            </div>
                                            <!-- infoOrders -->
                                            <div class="infoOrders">
                                                <div class="info">
                                                    <h5>
                                                        OPBNAYO
                                                    </h5>
                                                    <p>
                                                        <i class="fa-solid fa-calendar-days"></i> <span>{{$prev_order->data()['createdDate']}}</span>
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-location-dot"></i> <span>{{$prev_order->data()['address']['addressName']}}</span>
                                                    </p>

                                                </div>
                                                <!-- priceOrders -->
                                                <div class="priceOrders">
                                                    <p>السعر الاجمالي:</p>
                                                    <p>{{$prev_order->data()['totalAmount']}}</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @empty
                                @endforelse

                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- max_width991 -->
            <div class="full_page">
                <div class="max_width991">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <a href="{{url('/')}}" class="angle">
                                        <i class="fa-regular fa-angle-right"></i> الطلبات
                                    </a>
                                </div>
                                <ul class="orderFilter">
                                    <li>
                                        <h3 data-orders="now1" class="active">
                                            الطلبات الحالية
                                        </h3>
                                    </li>
                                    <li>
                                        <h3 data-orders="prev1">
                                            الطلبات السابقة
                                        </h3>
                                    </li>
                                </ul>
                            </div>
                            <!--  -->
                            <div class="col-12">
                                <!-- now -->
                                <div id="now1">
                                    @forelse($orders['now'] as $new_order)

                                        <div class="ordersCard">
                                            <!-- numberOrder -->
                                            <div class="numberOrder d-flex align-items-center">
                                                <p>
                                                    رقم الطلب:
                                                </p>
                                                <p>
                                                    {{$new_order->data()['orderNumber']}}
                                                </p>
                                            </div>
                                            <!-- detailsOrders -->
                                            <div class="detailsOrders">
                                                <!-- detailsImg -->
                                                <div class="detailsImg">
                                                    <div class="img">
                                                        <img src="{{$new_order->data()['storeLogoImage']}}" alt="">
                                                    </div>
                                                    <p>
                                                        <button>
                                                            بانتظار الموافقة
                                                        </button>
                                                    </p>
                                                </div>
                                                <!-- infoOrders -->
                                                <div class="infoOrders">
                                                    <div class="info">
                                                        <h5>
                                                            OPBNAYO
                                                        </h5>
                                                        <p>
                                                            <i class="fa-solid fa-calendar-days"></i> <span>{{$new_order->data()['createdDate']}}</span>
                                                        </p>
                                                        <p>
                                                            <i class="fa-solid fa-location-dot"></i> <span>{{$new_order->data()['address']['addressName']}}</span>
                                                        </p>

                                                    </div>
                                                    <!-- priceOrders -->
                                                    <div class="priceOrders">
                                                        <p>السعر الاجمالي:</p>
                                                        <p>{{$new_order->data()['totalAmount']}}</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <!-- prev -->
                                <div id="prev1">

                                    @forelse($orders['prev'] as $prev_order)

                                        <div class="ordersCard">
                                            <!-- numberOrder -->
                                            <div class="numberOrder d-flex align-items-center">
                                                <p>
                                                    رقم الطلب:
                                                </p>
                                                <p>
                                                    {{$prev_order->data()['orderNumber']}}
                                                </p>
                                            </div>
                                            <!-- detailsOrders -->
                                            <div class="detailsOrders">
                                                <!-- detailsImg -->
                                                <div class="detailsImg">
                                                    <div class="img">
                                                        <img src="{{$prev_order->data()['storeLogoImage']}}" alt="">
                                                    </div>
                                                    <p>
                                                        <button>
                                                            بانتظار الموافقة
                                                        </button>
                                                    </p>
                                                </div>
                                                <!-- infoOrders -->
                                                <div class="infoOrders">
                                                    <div class="info">
                                                        <h5>
                                                            OPBNAYO
                                                        </h5>
                                                        <p>
                                                            <i class="fa-solid fa-calendar-days"></i> <span>{{$prev_order->data()['createdDate']}}</span>
                                                        </p>
                                                        <p>
                                                            <i class="fa-solid fa-location-dot"></i> <span>{{$prev_order->data()['address']['addressName']}}</span>
                                                        </p>

                                                    </div>
                                                    <!-- priceOrders -->
                                                    <div class="priceOrders">
                                                        <p>السعر الاجمالي:</p>
                                                        <p>{{$prev_order->data()['totalAmount']}}</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="{{asset('/assets/front/')}}/js/dropify.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/intlTelInput.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/utils.js"></script>
@endsection
@section('js')

    <script>
    </script>
@endsection

