<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
* @mixin \Eloquent
*/
abstract class AttributeValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function price()
    {
        return $this->morphOne(AttributeValuePrice::class, 'priceable');
    }

    abstract public function saveValue(Product $product, Request $request);
}