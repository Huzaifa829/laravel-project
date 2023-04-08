<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Checkout\Common\Exemption;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function allbrands()
    {
        $collectionbrands = Brand::Where([['status', true]])->get();
        return view('pages.brand')->with(compact('collectionbrands'));
    }

    public function brandproduct($slug)
    {
        try{
            $brand = Brand::Where('slug', $slug)->first();
            if ($brand) {
                $mainshopproducts = $brand;
                $collectioncategory = Category::where([['status', true]])->get()->toTree();
                $collectionproduct = DB::table('products as pr')
                                            ->join('category_product as cp','cp.product_id','=','pr.id')
                                            ->join('categories as cat','cat.id','=','cp.category_id')
                                            ->join('brands as b','b.id','=','pr.brandid')
                                            ->where('b.id',$brand->id)
                                            ->select('pr.id',
                                                    'pr.productcode',
                                                    'pr.title as productname',
                                                    'pr.slug',
                                                    'pr.longdescription',
                                                    'pr.shortdescription',
                                                    'pr.thumbnail',
                                                    'pr.mfr',
                                                    'pr.upc',
                                                    'pr.sku',
                                                    'pr.length',
                                                    'pr.width',
                                                    'pr.height',
                                                    'pr.weight',
                                                    'pr.price',
                                                    'pr.status',
                                                    'pr.visibility',
                                                    'pr.brandid',
                                                    'pr.inthebox',
                                                    'pr.specifications',
                                                    'cat.categorycode',
                                                    'cat.title as categoryname',
                                                    'b.brandcode',
                                                    'b.title as brandtitle',
                                                    'b.image')->groupBy('pr.id')->paginate(28);

                $productcount = Product::where('brandid', $brand->id)->count();
                if(!$collectionproduct->isEmpty()){
                    return view('shop.brandshop')->with(compact('collectionproduct', 'productcount', 'collectioncategory', 'mainshopproducts'));

                }else{
                    return view('pages.notfound')->with(compact('brand'));
                }
            } else {
                return back();
            }

        }
        catch(Exemption $exe){
            dd($exe);
        }
    }
}
