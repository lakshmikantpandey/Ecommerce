<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Http\Requests\StoreCartModelRequest;
use App\Http\Requests\UpdateCartModelRequest;

class CartModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartModel $cartModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartModel $cartModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartModelRequest $request, CartModel $cartModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartModel $cartModel)
    {
        //
    }
}