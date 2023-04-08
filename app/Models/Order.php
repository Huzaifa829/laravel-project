<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','billing_email','billing_name','billing_address','billing_city','billing_provice','billing_postalcode','billing_phone',
        'name_on_card','billing_subtotal','tax','total'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function products()
    // {
    //     return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    // }

}
