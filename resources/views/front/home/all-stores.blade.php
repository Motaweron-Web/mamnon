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
    <section class="products_max">
        <div class="container">
            <!--  -->
            <div>
                <div class="headTitle text-center">
                    <h3>
                        متاجر
                    </h3>
                </div>
                <!-- filterProductsMax -->
                <div class="filterProductsMax">
                    <ul>
                        @forelse($categories as $category)

                            <li data-filter2="{{$category->id()}}"
                                onclick="showMy('{{$category->id()}}')">
                                {{$category->data()['name']}}
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
                        @forelse($stores as $store)
                            <div class="col-md-4">
                                <div class="products_maxCard">
                                    <!-- img -->
                                    <div class="img">
                                        <img src="{{$store->data()['coverImagePath']}}" alt="">
                                    </div>
                                    <!-- detailsProducts -->
                                    <div class="detailsProducts ">
                                        <!-- shop name -->
                                        <h3 class="">
                                            {{$store->data()['name']}}
                                        </h3>


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
    <section class="products_min app_vue">
        <div class="products_min2">
            <div class="navbar">
                <div class="container d-flex">

                    <div>
                        <a href="{{url('/')}}">
                            <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </div>
                    <div>
                        <p>متاجر</p>
                    </div>
                    <div>
                        <select name="" class="select" id="">

                            @forelse($categories as $category)
                                <option
                                    value="{{$category->id()}}">  {{$category->data()['name']}} </option>
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
                            @forelse($categories as $category)

                                <li data-filter="{{$category->id()}}">
                                    {{$category->data()['name']}}
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

                            @forelse($stores as $store)
                                <div class="col-md-4">
                                    <div class="products_maxCard">
                                        <!-- img -->
                                        <div class="img">
                                            <img src="{{$store->data()['coverImagePath']}}" alt="">
                                        </div>
                                        <!-- detailsProducts -->
                                        <div class="detailsProducts ">
                                            <!-- shop name -->
                                            <h3 class="">
                                                {{$store->data()['name']}}
                                            </h3>


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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

@endsection
@section('js')

    <script>

        var myObject = new Vue({
            el: '#app',

            data: [],
            stores: [],



        })





    </script>
@endsection

