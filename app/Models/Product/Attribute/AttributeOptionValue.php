<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class AttributeOptionValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_option');
    }
}