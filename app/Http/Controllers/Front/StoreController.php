<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StoreService;
use App\Services\CategoryService;
use App\Services\ProductCategoryService;
use App\Services\GovernorateService;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    private StoreService $store;
    private CategoryService $category;
    private GovernorateService $governorate;
    private ProductCategoryService $product_category;

    /**
     * @param StoreService $store
     * @param CategoryService $category
     * @param GovernorateService $governorate
     */
    public function __construct(StoreService $store, CategoryService $category, GovernorateService $governorate,ProductCategoryService $product_category)
    {
        $this->store = $store;
        $this->category = $category;
        $this->governorate = $governorate;
        $this->product_category = $product_category;
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

    public function store(StoreRequest $request){
        $status = $this->store->store($request);
        if($status == 201) {
            toastr()->success('Data has been Updated successfully!');
            return back();
        }if($status == 422) {
            toastr()->error('Sorry this phone number used before');
            return back();
        }
        toastr()->error('An error has occurred please try again.');

        return back();
    }

}
