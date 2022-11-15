
<div class="single-products">

    <div class="products-image">
        <a href="{{ url('product-details').'?product_id='.$product['id'] }}"><img src="{{ GetImg($product['main_image']) }}"></a>
        @if($product['have_offer'] == 'yes')
            <div class="saleTag">{{ $product['offer_value'] }} {{ $product['offer_type'] == 'per' ? ' %' : trans('web_lang.IQD') }} </div>
        @endif
        <ul class="action">
            <li><a class="add-to-favourite favourite_{{ $product['id'] }}" href="#!" product-id="{{ $product['id'] }}"><i class="{{ $product['product_favourite'] != null || isset($fav)  ? 'active' : ''  }} far fa-heart"></i></a></li>
            @if($product['user_inner_list_id'] != null)
                <li><a class="add-cart" href="#!" product-id="{{ $product['id'] }}" ><i class="{{ get_one_cart($product['id'])  != null ? 'active' : ''  }} far fa-shopping-cart"></i></a></li>
            @endif
            <li><a class="show-product" href="#!" data-toggle="modal"product-id="{{ $product['id'] }}"  data-target="#productsQuickView"><i class="fal fa-eye"></i></a></li>
        </ul>
    </div>


    <div class="products-content">

        <h3> <a href="{{ url('product-details').'?product_id='.$product['id'] }}">{{ $product['name'] }}</a> </h3>
        <p>{{ $product['details'] }}</p>

        @if($product['old_price'] > $product['price'])
          <span class="oldPrice">{{ $product['old_price'] }}</span>
        @endif

        <span class="price">{{ $product['price'] }} {{trans('web_lang.ID')}}</span>

    </div>

</div>
