<?php

namespace App\Repositories;

class UserRepository extends FirestoreRepository
{
    public function __construct($user ="admin_user")
    {
        $this->setModel($user);
    }

    public function customerAnalytics(): array
    {
        //retreytu
        return [];
    }
}
