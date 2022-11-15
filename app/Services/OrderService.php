<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    private OrderRepository $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function get_orders()
    {
        $orders['now'] = $this->orderRepository->where('customerId' ,'=', Auth::user()->firestore_user_id)
                            ->where('status' ,'=', 1)->documents();
        $orders['prev'] = $this->orderRepository
            ->where('status' ,"in", [2,3,4])->where('customerId' ,'=', Auth::user()->firestore_user_id)->documents();
        return $orders;
    }

}
