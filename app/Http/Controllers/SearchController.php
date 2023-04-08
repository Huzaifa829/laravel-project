<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTags;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search($data)
    {

        $collectioncategory = Category::where([['status', true]])->get()->toTree();

        $productcount = Product::where('title','like',"%$data%")
                                        ->orWhere('mfr','like',"%$data%")
                                        ->orWhere('products.searchtitle','like',"%$data%")
                                        ->orWhere('upc','like',"%$data%")->count();

        $collectionproduct = DB::table('products')->join('category_product', 'products.id', '=','category_product.product_id')
                                        ->join('categories', 'category_product.category_id', '=','categories.id')
                                        ->select('products.*','categories.title as category_name')
                                        ->where('products.title','like',"%$data%")
                                        ->orWhere('categories.title','like',"%$data%")
                                        ->orWhere('products.mfr','like',"%$data%")
                                        ->orWhere('products.upc','like',"%$data%")
                                        ->orWhere('products.shortdescription','like',"%$data%")
                                        ->orWhere('products.searchtitle','like',"%$data%")
                                        ->orderBy('products.title')
                                        ->groupBy('products.mfr')
                                        ->paginate(28);

        if($collectionproduct->isEmpty()){

            $productcount = Product::join('search_key_words', 'search_key_words.product_id', '=','products.id')
                                        ->where('title','like',"%$data%")
                                        ->orWhere('mfr','like',"%$data%")
                                        ->orWhere('products.searchtitle','like',"%$data%")
                                        ->orWhere('search_key_words.productkeywords','like','%'.$data.'%')
                                        ->orWhere('upc','like',"%$data%")->count();

            $collectionproduct = DB::table('products')
                                        ->join('search_key_words', 'search_key_words.product_id', '=','products.id')
                                        ->join('category_product', 'products.id', '=','category_product.product_id')
                                        ->join('categories', 'category_product.category_id', '=','categories.id')
                                        ->select('products.*','categories.title as category_name')
                                        ->where('products.title','like',"%$data%")
                                        ->orWhere('categories.title','like',"%$data%")
                                        ->orWhere('products.mfr','like',"%$data%")
                                        ->orWhere('products.upc','like',"%$data%")
                                        ->orWhere('products.shortdescription','like',"%$data%")
                                        ->orWhere('products.searchtitle','like',"%$data%")
                                        ->orWhere('search_key_words.productkeywords','like','%'.$data.'%')
                                        ->orderBy('products.title')
                                        ->groupBy('products.mfr')
                                        ->paginate(28);

            if($collectionproduct->isEmpty()){
                $collectionparentcategory = Category::where([['status',true],['parent_id',null]])->get();
                return view('pages.notfoundsearch')->with(compact('data','collectionparentcategory'));
            }
            else{
                return view('shop.search_results')->with(compact('collectionproduct','productcount','collectioncategory'));
            }
        }else{

            return view('shop.search_results')->with(compact('collectionproduct','productcount','collectioncategory'));
        }

    }

    public function productSearch(Request $request){
        $title = $request->input('title');

        $product = DB::table('products')
                            ->join('category_product', 'products.id', '=','category_product.product_id')
                            ->join('categories', 'category_product.category_id', '=','categories.id')
                            ->join('product_tags','product_tags.productid','=','products.id')
                            ->select('products.*','categories.title as category_name')
                            ->Where('products.title','like',"%$title%")
                            ->orWhere('categories.title','like',"%$title%")
                            ->orWhere('products.mfr','like',"%$title%")
                            ->orWhere('product_tags.tags','like',"%$title%")
                            ->orWhere('products.searchtitle','like',"%$title%")
                            ->groupBy('products.mfr')
                            ->limit(6)
                            ->get();

        if($product){
            return response()->json(array('success'=>true,'product'=>$product));
        }
        else{
            return response()->json(array('success'=>false));
        }

    }

    public function mobilesearch(Request $request)
    {

        $title = $request->input('title');

        $product = DB::table('products')
                    ->join('search_key_words', 'search_key_words.product_id', '=','products.id')
                    ->select('products.*')
                    ->Where('products.title','like','%'.$title.'%')
                    ->orWhere('products.mfr','like','%'.$title.'%')
                    ->orWhere('products.upc','like','%'.$title.'%')
                    ->orWhere('products.searchtitle','like','%'.$title.'%')
                    ->orWhere('search_key_words.productkeywords','like','%'.$title.'%')
                    ->groupBy('products.mfr')
                    ->limit(6)
                    ->get();

        if($product->isEmpty()){
            $product = DB::table('products')
                    ->select('products.*')
                    ->Where('products.title','like','%'.$title.'%')
                    ->orWhere('products.mfr','like','%'.$title.'%')
                    ->orWhere('products.upc','like','%'.$title.'%')
                    ->orWhere('products.searchtitle','like','%'.$title.'%')
                    ->groupBy('products.mfr')
                    ->limit(6)
                    ->get();
        }

        $data = [
            'product' => $product
        ];

        return response()->json(array('success'=>true,'data'=>$data));
    }

    public function searchdata(Request $request){

        $title = $request->input('title');

        $product = DB::table('products')
                            ->join('search_key_words', 'search_key_words.product_id', '=','products.id')
                            ->select('products.*')
                            ->Where('products.title','like','%'.$title.'%')
                            ->orWhere('products.mfr','like','%'.$title.'%')
                            ->orWhere('products.upc','like','%'.$title.'%')
                            ->orWhere('products.searchtitle','like','%'.$title.'%')
                            ->orWhere('search_key_words.productkeywords','like','%'.$title.'%')
                            ->groupBy('products.mfr')
                            ->limit(6)
                            ->get();


        if($product->isEmpty()){
            $product = DB::table('products')
                    ->select('products.*')
                    ->Where('products.title','like','%'.$title.'%')
                    ->orWhere('products.mfr','like','%'.$title.'%')
                    ->orWhere('products.upc','like','%'.$title.'%')
                    ->orWhere('products.searchtitle','like','%'.$title.'%')
                    ->groupBy('products.mfr')
                    ->limit(6)
                    ->get();
        }

        $brand = Brand::where('title','like', '%'.$title.'%')->limit(6)->get();
        $suggestions = ProductTags::where('tags','like', '%'.$title.'%')->groupBy('tags')->limit(15)->get();

            $data =[
                'product' => $product,
                'brand' => $brand,
                'suggestions' => $suggestions,
            ];
            return response()->json(array('success'=>true,'data'=>$data));
    }


    public function searchsuggestion($data){

        $collectioncategory = Category::where([['status', true]])->get()->toTree();

        $collectionproduct = DB::table('products')->join('category_product', 'products.id', '=','category_product.product_id')
                                        ->join('categories', 'category_product.category_id', '=','categories.id')
                                        ->join('product_tags','product_tags.productid','=','products.id')
                                        ->select('products.*','categories.title as category_name')
                                        ->where('products.title','like',"%$data%")
                                        ->orWhere('categories.title','like',"%$data%")
                                        ->orWhere('products.mfr','like',"%$data%")
                                        ->orWhere('products.upc','like',"%$data%")
                                        ->orWhere('product_tags.tags','like',"%$data%")
                                        ->groupBy('products.mfr')
                                        ->paginate(28);
        if($collectionproduct->isEmpty()){

            $collectionparentcategory = Category::where([['status',true],['parent_id',null]])->get();
            return view('pages.notfoundsearch')->with(compact('data','collectionparentcategory'));

        }else{

            return view('shop.suggestions_results')->with(compact('collectionproduct','collectioncategory'));

        }
    }
}
