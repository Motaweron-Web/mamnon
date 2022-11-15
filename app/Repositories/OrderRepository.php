<?php

namespace App\Repositories;

class OrderRepository extends FirestoreRepository
{
    public function __construct($order ="order")
    {
        $this->setModel($order);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
