@extends('front/layouts/app')
@section('content')
    <style>
        .ul-class {
            font-size: 18px;
            border: 1px solid var(--hoverRed);
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            color: var(--main);
            transition: var(--transition);
            margin: 10px
            /*display: inline;*/
        }
        .ul-class:hover{
            background-color: var(--hoverRed);
            border: 1px solid transparent;
            color: #fff;
        }
        .ul{
            margin-bottom: 5vh;
            flex-wrap: wrap;
        }
    </style>
    <!--  -->
    @include('front/layouts/banner')

    <!-- filter World HWF -->
    @include('front/layouts/filter-active')
    <section class="AllFilter">
        <div class="container">
            <!-- stor -->
            <div id="stor">
                <!-- all -->
                <div class="products">
                    <div class="filterAll products">
                        <div class="headTitle text-center" >
                            <h3>
                                منتجات
                            </h3>
                        </div>
                        <div class="row">
                            <!-- 1 men-->
                            @forelse($products as $product)
                                <div class="col-md-3  {{$product->data()['productCategory']['id']}}">
                                    <div class="AllFilterCard">
                                        <div class="img">
{{--                                            {{ dd($product->data()) }}--}}
                                            <img src="{{$product->data()['images'][0]}}" alt="{{$product->data()['productCategory']['id']}}">
    {{--                                        <img src="{{asset('/assets/front/')}}/img/man/men.jpg" alt="men">--}}
                                        </div>
                                        <p>
                                            {{$product->data()['name'] ?? "اسم المنتج"}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>

                        <!--  -->
                        <div class="button text-center">
                            <button>
                                <a href="{{url('all-products')}}">
                                    اظهار المزيد   <i class="fa-regular fa-arrow-left"></i>
                                </a>

                            </button>
                        </div>
                    </div>

                </div>
                <!--  -->
                <div class="stor">
                    <div class="filterAll products">
                        <div class="headTitle text-center" >
                            <h3>
                                متاجر
                            </h3>
                        </div>
                        <!-- filterProductsMax -->
                        <div class="filterProductsMax">
                            <ul class="d-flex align-items-center justify-content-between ul">
                                @forelse($categories as $category)
{{--                                    {{ dd($category->id) }}--}}
                                <li class="ul-class" data-filter2="{{$category->id()}}">
                                    {{$category->data()['name']}}
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="row">
                            <!-- 1 men-->
                            @forelse($stores as $store)
                                <div class="col-md-3 {{$store->data()['storeCategoryId']}}">
                                    <div class="AllFilterCard">
                                        <div class="img">
{{--                                                                                    {{ dd($store->data()) }}--}}
                                            <img src="{{$store->data()['coverImagePath']}}" alt="{{$store->data()['storeCategoryId']}}">
                                        </div>
                                        <p>
                                            {{$store->data()['name'] ?? "اسم المتجر"}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>

                        <div class="button text-center">
                            <button>
                                <a href="{{url('/all-stores')}}">
                                    اظهار المزيد   <i class="fa-regular fa-arrow-left"></i>
                                </a>

                            </button>
                        </div>
                    </div>
                    <!--  -->

                </div>
                <!--  -->
                <div class="page">
                    <div class="filterAll products">
                        <div class="headTitle text-center" >
                            <h3>
                                صفحات الكترونية (بيجات)
                            </h3>
                        </div>
                        <div class="row">
                            <!-- 1 men-->
                            @forelse($pages as $page)
                                <div class="col-md-3 {{$page->data()['storeCategoryId']}}">
                                    <div class="AllFilterCard">
                                        <div class="img">
                                            {{--                                                                                    {{ dd($store->data()) }}--}}
                                            <img src="{{$page->data()['logoImagePath']}}" alt="{{$page->data()['storeCategoryId']}}">
                                        </div>
                                        <p>
                                            {{$page->data()['name'] ?? "اسم الصفحة"}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>

                        <!--  -->
                        <div class="button text-center">
                            <button>
                                <a href="{{url('/pages')}}">
                                    اظهار المزيد   <i class="fa-regular fa-arrow-left"></i>
                                </a>

                            </button>
                        </div>
                    </div>

                </div>
                <!--  -->
            </div>
            <!--  -->

        </div>
    </section>

@endsection
@section('js')
<script>
    $('.HWF h3').click(function () {
        var id_class = $(this).data("filter");
        $(this).addClass("active").siblings().removeClass('active');
        $('.'+id_class).hide();
        $("." + $(this).data("filter")).fadeIn(500).siblings().hide();

    })
    $('.filterProductsMax ul  li').click(function () {
        var id_classes = $(this).data("filter2");
        $(this).addClass("active").siblings().removeClass('active')
        $('.'+id_classes).hide();

        $("." + $(this).data("filter2")).fadeIn(500).siblings().hide()

    })
</script>
@endsection

