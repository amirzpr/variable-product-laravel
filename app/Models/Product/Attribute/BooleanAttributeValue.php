<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class BooleanAttributeValue extends Model
{
    protected $guarded = [];
    protected $casts = ['value' => 'boolean'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}