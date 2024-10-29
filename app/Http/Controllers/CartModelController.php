<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

class CartModelController extends Controller
{
    public function showCart()
    {
        $cartItems = CartModel::where('user_id', Auth::id())->with('product')->get();

        return view('pages.cart', compact('cartItems'));
    }

    public function addIntoCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartModel::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartModel::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function update(Request $request, CartModel $cartModel)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartModel->quantity = $request->quantity;
        $cartModel->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function destroy(CartModel $cartModel)
    {
        $cartModel->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}