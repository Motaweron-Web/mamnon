<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StoreService;
use App\Services\CategoryService;
use App\Services\GovernorateService;

class StoreController extends Controller
{
    private StoreService $store;
    private CategoryService $category;
    private GovernorateService $governorate;

    /**
     * @param StoreService $store
     * @param CategoryService $category
     * @param GovernorateService $governorate
     */
    public function __construct(StoreService $store, CategoryService $category, GovernorateService $governorate)
    {
        $this->store = $store;
        $this->category = $category;
        $this->governorate = $governorate;
    }

    public function index(){
        $data['stores'] =  $this->store->all()->documents();
        $data['categories'] =  $this->category->all()->documents();
        $data['products_categories'] =  $this->product_category->all()->documents();

        return view('front.home.all-stores',$data);
    }

    public function create(){
        $data['governorates'] = $this->governorate->all()->documents();
//       dd($data['governorates']);
        return view('front.store.add_store',$data);
    }



}
