<?php

namespace App\Repositories;

class GovernorateRepository extends FirestoreRepository
{
    public function __construct($model ="governorates")
    {
        $this->setModel($model);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}