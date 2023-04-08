<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;
    protected $guarded = [];

    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public static function categoryDetails($url)
    {
        $categoriesData = Category::Select('id', 'title', 'slug')->with(['children' => function ($query) {
            $query->select('id', 'parent_id')->where([['status', true], ['visibility', true]]);
        }])->where('slug', $url)->first()->toArray();

        $catIds = array();
        $catIds[] = $categoriesData['id'];

        foreach ($categoriesData['children'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
        }

        return array('catIds' => $catIds, 'categoriesData' => $categoriesData);
    }
}
