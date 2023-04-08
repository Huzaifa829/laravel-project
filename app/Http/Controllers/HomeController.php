<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use Exception;
use Adrianorosa\GeoLocation\GeoLocation;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        try{
            $collectionbrands = Brand::where([['status', true],['isfeatured',true]])->take(16)->get();
            $collectioncategory = Category::with(
                ["descendants" => function ($query) {
                    $query->where([['status', 1]]);}])->where([
                        ['status', true],
                        ['isfeatured', true],
                        ['parent_id', null]])->orderBy('order', 'ASC')->take(6)->get();

            $collectionfeatureproducts = Product::Where([['status',true],['isfeatured',true]])->orderBy('id', 'DESC')->take(10)->get();
            $collectionnewproducts = Product::where([['status',true]])->latest()->take(16)->get();
            $promotionproducts = Product::where([['status',true]])->inRandomOrder()->limit(10)->get();
            $collectionslider = Slider::Where([['status',true]])->get();

            return view('welcome')->with(compact('collectionbrands','collectionfeatureproducts','collectioncategory','promotionproducts','collectionslider','collectionnewproducts'));
        }
        catch(Exception $ex){
            dd($ex);
        }
    }
}
