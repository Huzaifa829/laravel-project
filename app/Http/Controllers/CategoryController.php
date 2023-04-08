<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryProduct;
use Checkout\Common\Exemption;

class CategoryController extends Controller
{
    public function categories($slug)
    {
        try{
        $maincategory = Category::where([['slug', '=', $slug], ['status', '=', true]])->get()->first();
        if ($maincategory === null) {
            return view('shop.shop');
        } else {
            $collectioncategory = Category::with(["descendants" => function ($query) {$query->where([['status', true]]);}])->where([['parent_id', $maincategory->id], ['status', true]])->orderBy('order', 'ASC')->get();
            if (!$collectioncategory->isEmpty()) {
                foreach ($collectioncategory as $category) {
                    foreach ($category->descendants as $child) {
                        return view('category.category')->with(compact('collectioncategory', 'maincategory'));
                    }
                }
                $categories = Category::categoryDetails($slug);
                $mainshopproducts = $maincategory;
                $collectioncategory = Category::whereIn('id',$categories['catIds'])->get()->toArray();
                $collectionproductcategories = CategoryProduct::whereIn('category_id', $categories['catIds'])->groupBy('product_id')->get()->toArray();
                $productcount = CategoryProduct::where('category_id', $maincategory->id)->count();
                $productIds = array();
                foreach ($collectionproductcategories as $products) {
                    $productIds[] = $products['product_id'];
                }
                $collectionproduct = Product::with('brands')->whereIn('id', $productIds)->where([['status', true]])->paginate(28);

                $brandids = array();
                foreach($collectionproduct as $productbrands){
                    $brandids[] = $productbrands['brandid'];
                }

                $collectionbrand = Brand::whereIn('id',$brandids)->get()->toArray();
                if(!$collectionproduct->isEmpty()){
                    return view('shop.shop')->with(compact('collectionproduct', 'productcount', 'collectioncategory', 'collectionbrand', 'mainshopproducts','maincategory'));
                }else{
                    return view('pages.notfoundshop')->with(compact('maincategory'));
                }

            } else {
                $mainshopproducts = $maincategory;
                $categories = Category::categoryDetails($slug);
                $collectioncategory = Category::whereIn('id',$categories['catIds'])->get()->toArray();
                $collectionproductcategories = CategoryProduct::whereIn('category_id', $categories['catIds'])->groupBy('product_id')->get()->toArray();
                $productIds = array();
                foreach ($collectionproductcategories as $products) {
                    $productIds[] = $products['product_id'];
                }
                $collectionproduct = Product::whereIn('id', $productIds)->where([['status', true]])->paginate(28);
                $brandids = array();
                foreach($collectionproduct as $productbrands){
                    $brandids[] = $productbrands['brandid'];
                }
                $productcount = CategoryProduct::where('category_id', $maincategory->id)->count();
                $collectionbrand = Brand::whereIn('id',$brandids)->get()->toArray();
                if(!$collectionproduct->isEmpty()){
                return view('shop.shop')->with(compact('collectionproduct', 'productcount', 'collectioncategory', 'collectionbrand', 'mainshopproducts','maincategory'));
                }else{
                    return view('pages.notfoundshop')->with(compact('maincategory'));
                }

            }
        }
        }catch(Exemption $exe){
            dd($exe);
        }

    }
}
