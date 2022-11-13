<div class="filter activeR">
    <div class="container">
        <!-- world filter -->
        <div class="HWF">
            @foreach($products_categories as $products_category)
            <h3 class=" " data-filter="{{$products_category->id()}}">
                {{$products_category->data()['name']['en_name']}}
            </h3>

            @endforeach

        </div>
    </div>
</div>
