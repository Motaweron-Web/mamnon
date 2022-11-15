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

    <script>

        let login_first = '{{trans('web_lang.login_first')}}';

        /* add */
        $(document).on('click', '.add-cart', function () {
            let product_id = $(this).attr('product-id');
            let quantity = $("#quantity").val();
            if (!quantity) {
                quantity = 1;
            }
            if (!product_id || !quantity) {
                toastr.error("{{ trans('web_lang.hinit! Empty quantity') }}", "{{ trans('web_lang.hinit!') }}", {
                    "positionClass": "toast-top-right",
                    "progressBar": true
                });
                return false;
            }
            ajax_cart(product_id, quantity);
            return false;
        }); // end click
        function ajax_cart(product_id, quantity) {

            let url = '{{ route("cart") }}';

            $.ajax({
                url: url,
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}", "product_id": product_id, "quantity": quantity},
                type: 'post',
                beforeSend: function () {


                    $('.add-cart i').removeClass('fa-shopping-cart').addClass('fa-spinner fa-spin');
                },
                complete: function () {
                },
                success: function (data) {
                    $('.add-cart i').removeClass('fa-spinner fa-spin').addClass('fa-shopping-cart');
                    $('.cart_count').html(data.cart_count)
                    toastr.success('{{trans('web_lang.added_to_chart')}}', {"positionClass": "toast-top-right", "progressBar": true});
                    console.log(data);
                },
                error: function (error, exception) {
                    console.log(error);
                    alert(error)
                }
            }); //end ajax
        }
        /* add */

        $(document).on('change', '.cart_update', function () {
            let url = "{{ route('update_cart') }}";
            let product_id = $(this).attr("product-id");
            let qty = $(this).val();

            $.ajax({
                url: url,
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}", "product_id": product_id, 'qty': qty},
                type: 'post',
                beforeSend: function () {

                },
                success: function (data) {
                    console.log(data);
                    toastr.success('{{trans('web_lang.update_chart')}}', {"positionClass": "toast-top-right", "progressBar": true});
                    $('.sub-total-price').text(data.total_price);
                    $('.total-price').text(data.total_price);
                    $('.total-payments').text(data.total_price);
                },
                error: function (data_error, exeption) {

                }
            }); //end ajax

            return false;
        }); // end click

        $(document).on('click', '.show-product', function () {
            let product_id = $(this).attr("product-id");
            let url = '{{ route("show-product") }}';
            $.ajax({
                url: url,
                dataType: 'json',
                data: {"product_id": product_id},
                type: 'get',
                beforeSend: function () {

                },
                success: function (data) {
                    /*console.log(data);*/
                    $('.show-product-content').html(data.html);
                    ajaxLoader();
                },
                error: function (data_error, exception) {

                }
            }); //end ajax

            return false;
        }); // end click


        function ajaxLoader(){
            $('.input-counter').each(function () {
                var spinner = jQuery(this),
                    input = spinner.find('input[type="number"]'),
                    btnUp = spinner.find('.plus-btn'),
                    btnDown = spinner.find('.minus-btn'),
                    min = input.attr('min'),
                    max = input.attr('max');
                btnUp.on('click', function () {
                    var oldValue = parseFloat(input.val());
                    if (oldValue >= max) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue + 1;
                    }
                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                });
                btnDown.on('click', function () {
                    var oldValue = parseFloat(input.val());
                    if (oldValue <= min) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue - 1;
                    }
                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                });
            });
            var galleryThumbs = new Swiper('.product-details-thumbs', {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });
            var galleryTop = new Swiper('.product-details-top', {
                spaceBetween: 10,
                speed: 1000,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                thumbs: {
                    swiper: galleryThumbs
                }
            });
        }



    </script>
@endsection

