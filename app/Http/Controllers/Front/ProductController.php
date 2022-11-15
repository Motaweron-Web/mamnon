<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $product;

    /**
     * @param ProductService $product
     */
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function show_product()
    {
        $product_id = request()->get('product_id');
        $product = $this->product->find($product_id);
        $html = view('front.pages.components.product-details', compact('product'))->render();
        return response()->json(['html' => $html]);
    }

}
