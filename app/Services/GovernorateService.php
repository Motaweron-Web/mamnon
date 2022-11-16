<?php

namespace App\Services;
use App\Repositories\GovernorateRepository;

class GovernorateService
{
    private GovernorateRepository $governorate;

    /**
     * @param GovernorateRepository $governorate
     */
    public function __construct(GovernorateRepository $governorate)
    {
        $this->governorate = $governorate;
    }

    public function all()
    {
        return $this->governorate->all();
    }
}