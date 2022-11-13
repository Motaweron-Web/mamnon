<?php

namespace App\Services;

use App\Repositories\StoreRepository;

class StoreService
{
    private StoreRepository $storeRepository;

    /**
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function all()
    {
        return $this->storeRepository->all();
    }

}
