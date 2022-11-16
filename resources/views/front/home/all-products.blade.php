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
    <section class="products_max app_vue">
        <div class="container">
            <!--  -->
            <div>
                <div class="headTitle text-center">
                    <h3>
                        منتجات
                    </h3>
                </div>
                <!-- filterProductsMax -->
                <div class="filterProductsMax">
                    <ul>
                        @forelse($products_categories as $products_category)

                            <li data-filter2="{{$products_category->id()}}"
                                onclick="showMy('{{$products_category->id()}}')">
                                {{$products_category->data()['name']['ar_name']}}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <!--  -->
            <div>
                <!-- AllFilterProductsMax -->
                <div class="AllFilterProductsMax">
                    <div class="row">

                        <!-- col-1 -->
                        @forelse($products as $product)
                            <div class="col-md-4 {{$product->data()['productCategory']['id']}}">
                                <div class="products_maxCard">
                                    <!-- img -->
                                    <div class="img">
                                        <img src="{{$product->data()['images'][0]}}" alt="">
                                    </div>
                                    <!-- detailsProducts -->
                                    <div class="detailsProducts">
                                        <!-- shop name -->
                                        <h3>
                                            {{$product->data()['storeName']}}
                                        </h3>
                                        <!-- products name -->
                                        <p>
                                            {{$product->data()['name']}}
                                        </p>
                                        <!-- prices -->
                                        <p>
                                            <span>{{$product->data()['price']}}</span>
                                            <span>{{$product->data()['priceCurrency']}}</span>
                                        </p>
                                        <a class="btn btn-info add-cart" href="#!" product-id="{{ $product->id() }}" ><i class="{{ get_one_cart($product->id())  != null ? 'active' : ''  }} far fa-shopping-cart"></i>add to cart</a>

                                    </div>

                                </div>
                                <!--  -->
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- min_width992 -->
    <section class="products_min ">
        <div class="products_min2">
            <div class="navbar">
                <div class="container d-flex">

                    <div>
                        <a href="{{url('/')}}">
                            <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </div>
                    <div>
                        <p>منتجات</p>
                    </div>
                    <div>
                        <select name="" class="select" id="">

                            @forelse($products_categories as $products_category)
                                <option
                                    value="{{$products_category->id()}}">  {{$products_category->data()['name']['ar_name']}} </option>
                            @empty
                            @endforelse

                        </select>
                    </div>
                    <div>
                        <p class="filtersss">
                            <i class="fa-thin fa-filters"></i>
                        </p>
                    </div>

                </div>
            </div>
            <div class="container">
                <!--  -->
                <div>
                    <div class="headTitle text-center">
                        <h3>
                            منتجات
                        </h3>
                    </div>
                    <!-- filterProductsMax -->
                    <div class="filterProductsMax">
                        <ul>
                            @forelse($products_categories as $products_category)

                                <li data-filter="{{$products_category->id()}}">
                                    {{$products_category->data()['name']['ar_name']}}
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!--  -->
                <div>
                    <!-- AllFilterProductsMax -->
                    <div class="AllFilterProductsMax">
                        <div class="row">
                            <!-- col-1 -->

                            @forelse($products as $product)
                                <div class="col-md-4 {{$product->data()['productCategory']['id']}}">
                                    <div class="products_maxCard">
                                        <!-- img -->
                                        <div class="img">
                                            <img src="{{$product->data()['images'][0]}}" alt="">
                                        </div>
                                        <!-- detailsProducts -->
                                        <div class="detailsProducts">
                                            <!-- shop name -->
                                            <h3>
                                                {{$product->data()['storeName']}}
                                            </h3>
                                            <!-- products name -->
                                            <p>
                                                {{$product->data()['name']}}
{{--                                                <button class="btn btn-info">fvv</button>--}}
                                            </p>
                                            <!-- prices -->
                                            <p>
                                                <span>{{$product->data()['price']}}</span>
                                                <span>{{$product->data()['priceCurrency']}}</span>
                                            </p>

                                        </div>

                                    </div>
                                    <!--  -->
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>

                    <!--  -->
                </div>
            </div>
        </div>
    </section>
    @include('front.general_components.ajax-code')

@endsection
@section('js')


@endsection

