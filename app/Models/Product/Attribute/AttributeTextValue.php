<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class AttributeTextValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'product_attribute_id';

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}