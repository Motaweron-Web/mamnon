<?php

namespace App\Repositories;

use App\Repositories\FirestoreRepository;

class ProductRepository extends FirestoreRepository
{
    public function __construct($product ="product")
    {
        $this->setModel($product);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
