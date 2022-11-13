<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService
{
    private ProductCategoryRepository $productCategory;

    /**
     * @param ProductCategoryRepository $productCategory
     */
    public function __construct(ProductCategoryRepository $productCategory)
    {
        $this->productCategory = $productCategory;
    }


    public function all()
    {
        return $this->productCategory->all();
    }
}
