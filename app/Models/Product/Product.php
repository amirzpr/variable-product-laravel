<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Category rootCategory
* @mixin \Eloquent
*/
class Product extends Model
{
    protected $guarded = [];

    public function rootCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
