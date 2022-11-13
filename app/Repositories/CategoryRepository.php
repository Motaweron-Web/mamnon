<?php

namespace App\Repositories;

class CategoryRepository extends FirestoreRepository
{
    public function __construct($model ="category")
    {
        $this->setModel($model);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
