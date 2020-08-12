<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class MultiSelectableAttributeValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}