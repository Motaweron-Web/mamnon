<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderService $order;

    /**
     * @param OrderService $order
     */
    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }

    public function __invoke()
    {
        $data['orders'] =  $this->order->get_orders();

//        dd($data['orders']);

        return view('front.orders.index',$data);
    }
}
