<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Http\Requests\StoreOrderModelRequest;
use App\Http\Requests\UpdateOrderModelRequest;
use Illuminate\Support\Facades\Auth;

class OrderModelController extends Controller
{
    public function index()
    {
        $orders = OrderModel::where('user_id', Auth::id())->get();

        return view('pages.orders', compact('orders'));
    }

    public function create()
    {
        // Show the form to create a new order
        return view('pages.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderModelRequest $request)
    {
        // Create a new order
        $order = OrderModel::create([
            'user_id' => Auth::id(),
            'total' => $request->total,
            'status' => 'pending', // Set initial status
            // Add other order fields as necessary
        ]);

        // Optionally, you can handle related data, e.g., order items

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderModel $orderModel)
    {
        // Show the details of a specific order
        return view('pages.orders.show', compact('orderModel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderModel $orderModel)
    {
        // Show the form to edit the specified order
        return view('pages.orders.edit', compact('orderModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderModelRequest $request, OrderModel $orderModel)
    {
        // Update the order details
        $orderModel->update($request->validated());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderModel $orderModel)
    {
        // Delete the specified order
        $orderModel->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
