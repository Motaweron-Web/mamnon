<?php

namespace App\Repositories;

class StoreRepository extends FirestoreRepository
{
    public function __construct($product ="store")
    {
        $this->setModel($product);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
