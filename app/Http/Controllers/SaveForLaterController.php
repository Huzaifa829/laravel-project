<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);
        return back()->with('success', 'Item Has Been Removed!');
    }

    public function switchToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart')->with('success', 'Item is Already in Your Cart!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        return redirect()->route('cart')->with('success', 'Item Added To Cart!');
    }

    public function saveForLater($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart')->with('success', 'Item is Already in Save For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        return redirect()->route('cart')->with('success', 'Item Added To Save For Later Successfully!');
    }
}
