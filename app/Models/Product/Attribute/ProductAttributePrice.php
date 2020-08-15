<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
 * @property ProductAttribute productAttribute
* @mixin \Eloquent
*/
class ProductAttributePrice extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function attributeValue()
    {
        return $this->morphTo();
    }
}
