<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CategoryService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\StoreService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private ProductService $product;
    private StoreService $store;
    private ProductCategoryService $product_category;
    private CategoryService $category;
    private UserService $user;

    /**
     * @param ProductService $product
     * @param StoreService $store
     * @param ProductCategoryService $product_category
     * @param CategoryService $category
     * @param UserService $user
     */
    public function __construct(ProductService $product, StoreService $store, ProductCategoryService $product_category, CategoryService $category, UserService $user)
    {
        $this->product = $product;
        $this->store = $store;
        $this->product_category = $product_category;
        $this->category = $category;
        $this->user = $user;
    }


    public function __invoke()
    {
        $data['products'] =  $this->product->all()->limit(12)->documents();
        $data['products_categories'] =  $this->product_category->all()->documents();
        $data['stores'] =  $this->store->all()->limit(12)->documents();
        $data['categories'] =  $this->category->all()->documents();
        $data['pages'] =  $this->store->all()->where('isPageStore','=',true)->limit(12)->documents();
        $data['user'] =  User::where('firestore_user_id','cNdjDOJLY1QKnCVUQ8XXLiZ5D5g1')->first();
//        Auth::login($data['user']);

        return view('front.home.index',$data);
    }

    public function all_products(){
        $data['products'] =  $this->product->all()->documents();
        $data['products_categories'] =  $this->product_category->all()->documents();

        return view('front.home.all-products',$data);
    }


}
