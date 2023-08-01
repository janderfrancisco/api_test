<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * List all orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['client', 'disc'])->get();

        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }


    /**
     * Store a new order.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $order = Order::create($data);

        return response()->json([
            'success' => true,
            'data' => $order,
            'message' => 'Order created successfully'
        ]);
    }

    /**
     * Display the order
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(['client', 'disc']);

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }


    /**
     * Update the order.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->validated();

        $order->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully'
        ]);
    }


}
