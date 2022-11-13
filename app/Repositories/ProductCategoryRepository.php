<?php

namespace App\Repositories;

class ProductCategoryRepository extends FirestoreRepository
{
    public function __construct($model ="productCategory")
    {
        $this->setModel($model);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
