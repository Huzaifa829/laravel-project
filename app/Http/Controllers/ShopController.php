<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\StoreWishListRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function singleproduct($slug)
    {

      $product = Product::where('slug', $slug)->firstOrFail();

        $cart_data = Cart::instance('default')->content();
        $item = '';
        if(count($cart_data) > 0) {
            foreach($cart_data as $data) {
                if($data->id == $product->id){
                    $item = $data->rowId;
                }
            }
        }

        $collectionproductcategories = CategoryProduct::where('product_id', $product->id)->first();
        $category_data = Category::find($collectionproductcategories->category_id);
        $brand = Brand::where('id', $product->brandid)->first();
        $productimages = $product::find($product->id)->productimages;
        $recommendedproducts = Product::where([['status',true],['visibility',true]])->inRandomOrder()->limit(8)->get();

        return view('shop.singleproduct')->with(compact('product', 'productimages', 'brand', 'item', 'category_data','recommendedproducts'));
    }

    public function store(StoreCartRequest $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        $sessionCart = Cart::add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');

        return back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item Has Been Removed!');
    }



    public function addtowishlist(StoreWishListRequest $request)
    {
        dd($request);
    }

    public function cartData()
    {
        $data = Cart::instance('default')->content();
        return response()->json($data);
    }

    public function updatecart(Request $request)
    {
        Cart::update($request->rowid,$request->quantity);
        return response()->json(['success']);
    }
}
