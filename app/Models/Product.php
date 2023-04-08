<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;
use App\Models\ProductTags;
use App\Models\RelatedProducts;
use App\Models\Availability;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory,Searchable;

    protected $table = 'products';
    protected $guarded = [];

    public function productimages()
    {
        return $this->hasMany(ProductImages::class,'productid','id');
    }

    public function producttags()
    {
        return $this->hasMany(ProductTags::class,'productid','id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class,'brandid');
    }

    public function relatedproducts()
    {
        return $this->hasMany(RelatedProducts::class,'productid','id');
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class,'availabilityid','id');
    }

    public function orderproduct()
    {
        return $this->belongsTo(OrderProduct::class,'product_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields=[
            'categories' => $this->categories->pluck('title')->toArray(),
        ];

        return array_merge($array,$extraFields);

    }
}
